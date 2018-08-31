pipeline {
    agent any

    stages {

        stage('Build') {
            steps {

                    script {
                         file = readFile('build.properties')
                         echo file
                         prop=[:]
                         file.eachLine { line ->
                                echo line
                                l = line.split("=")
                                echo l[0]
                                echo l[1]
                                prop[l[0].trim()]=l[1].trim()
                          }


                          for (item in prop) {
                            echo (item.key + "=" + item.value)
                            env << (item.key + "=" + item.value)
                          }
                           env = ["a=1","b=2"]

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