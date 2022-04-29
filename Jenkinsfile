#!groovy script
node {
  stage('Checkout') {
    checkout scm
  }
  stage('sonarqube analysis') {
    def scannerHome = tool 'Sonar Scanner';
    withSonarQubeEnv('my sonarqube') { 
      sh "${scannerHome}/bin/sonar-scanner"
      stash includes: ".sonar/report-task.txt", name: 'sonar'
    }
  }
}
  
  

