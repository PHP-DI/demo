#!groovy script
node {
  stage('Checkout') {
    checkout scm
  }
  stage('sonarqube analysis') {
    def scannerHome = tool 'Sonar Scanner';
    withSonarQubeEnv('SonarQube') { 
      sh "${scannerHome}/bin/sonar-scanner"
    }
  }
}
  
  

