pipeline {
    agent any

    stages {

        stage('Build') {
            steps {

                    script {
                         file = readFile('build.properties')
                         prop=[:]
                         file.eachLine{
                            line -> l=line.split("=")
                            prop[l[0]]=l[1]
                     }

                      env = [];
                      for (name in prop) {
                        env << (name + "=" + prop[name])
                      }
                    }

                    withEnv(env){

                        echo 'Building...'

                        //sh 'npm install'
                        //sh 'bower install'
                        //sh 'composer install'
                       // sh 'gulp install-build'
                       // sh 'gulp build'
                        sh 'env'
                        archiveArtifacts artifacts: 'build/'
                    }
            }
        }
        stage('Test') {
            steps {
                echo 'Testing...'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying...'
            }
        }
    }
    post {
            always {
                cleanWs()
            }
        }
}