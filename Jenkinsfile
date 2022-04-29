#!groovy script
node {
  stage('Checkout') {
    checkout scm
  }
    stage('SonarQube analysis') {
        // requires SonarQube Scanner 2.8+
        def scannerHome = tool 'Sonar Scanner';
        withSonarQubeEnv('SonarQube') {
          sh "${scannerHome}/bin/sonar-scanner"
        }
  }
}

  
//Sonar Scanner
//my sonarqube
