#!groovy script
node {
  stage('Checkout') {
    checkout scm
  }
  stage('sonarqube analysis') {
    def scannerHome = tool 'Sonar Scanner'; 
    withSonarQubeEnv('my sonarqube') {
    def projectKey=env.JOB_NAME.replaceAll('/','.')

      sh "${scannerHome}/bin/sonar-scanner  -D sonar.projectKey=${projectKey}"
    }
  }
}
  
  
//Sonar Scanner
//my sonarqube
