pipeline{
  agent any
  environment{
    staging_server="13.126.81.246"
  }
  
  stages{
    stages('Deploy to remote'){
      steps{
        sh 'scp ${WORKSPACE}/* root@${staging_server}:/var/www/html/'  
      }
    }
  }
}
