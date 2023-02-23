pipeline{
  agent any
  environment{
    staging_server="13.126.81.246"
  }
  
  stages{
    stage('Deploy to remote'){
      steps{
        sh 'scp ${WORKSPACE}/* root@${staging_server}:/var/www/html/'  
      }
    }
  }
}
