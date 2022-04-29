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
           stash includes: ".sonar/report-task.txt", name: 'sonar'

        }
  }
}
  //stage('quality gate') {
    

  
//Sonar Scanner
//my sonarqube
