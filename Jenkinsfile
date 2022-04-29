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

          sh "${scannerHome}/bin/sonar-scanner -D sonar.projectKey=${projectKey} -D sonar.sources=. -D sonar.host.url='http://3.111.42.179:9000/'" 
          //-D sonar.sources=. -D sonar.host.url='' -D sonar.exclusions=bootstrap/**,config/**,database/**,docker/**,public/**,storage/**,tests/**,vendor/**"
          //stash includes: ".sonar/report-task.txt", name: 'sonar'
        }
  }
}

  
//Sonar Scanner
//my sonarqube
