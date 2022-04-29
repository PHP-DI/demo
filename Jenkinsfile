#!groovy script
node {
  stage('Checkout') {
    checkout scm
  }
    stage('SonarQube analysis') {
        // requires SonarQube Scanner 2.8+
        def scannerHome = tool 'Sonar Scanner';
        withSonarQubeEnv('SonarQube') {
        def projectKey=env.JOB_NAME.replaceAll('%2F','.')
        projectKey=projectKey.replaceAll('/','.')

        echo "projectKey: ${projectKey}"

          sh "${scannerHome}/bin/sonar-scanner -D sonar.projectKey=${projectKey}"
           //stash includes: ".sonar/report-task.txt", name: 'sonar'

        }
  }

  stage('quality gate') {
            //unstash 'sonar'
            //def props = getProperties(".sonar/report-task.txt")
            def props = getProperties(".scannerwork/report-task.txt")
            def sonarServerUrl=props.getProperty('serverUrl')
            def ceTaskUrl= props.getProperty('ceTaskUrl')
            def ceTask
            def analysisStatus
            while(analysisStatus != 'SUCCESS') {
                sleep(5)
                ceTask = jsonParse(new URL(ceTaskUrl).getText(requestProperties: [Authorization: "Basic " + "admin:admin".getBytes().encodeBase64().toString()]))
                analysisStatus = ceTask["task"]["status"]
            }
            def analysisId = ceTask["task"]["analysisId"]
            def analysisResultUrl = sonarServerUrl + "/api/qualitygates/project_status?analysisId=" + analysisId
            def qualitygate = jsonParse(analysisResultUrl.toURL().getText(requestProperties: [Authorization: "Basic " + "admin:admin".getBytes().encodeBase64().toString()]))
            def qualitygateStatus = qualitygate["projectStatus"]["status"]
            echo "qualitygateStatus=${qualitygateStatus}"
            if ("ERROR".equals(qualitygateStatus)) {
                error "Quality Gate failure"
            }

    }
}

def Properties getProperties(filename) {
    def properties = new Properties()
    properties.load(new StringReader(readFile(filename)))
    return properties
}

@NonCPS
def jsonParse(def json) {
    new groovy.json.JsonSlurperClassic().parseText(json)
}


    

  
//Sonar Scanner
//my sonarqube
