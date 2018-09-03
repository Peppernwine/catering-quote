pipeline {
    agent any

    stages {

        stage('Build Docker Image') {
            steps {
                    script {
                        app = docker.build("rajeev74/catering-quote")
                        app.inside {
                            sh 'echo $(curl localhost:80)'
                        }


                  }
            }
        }
        stage('Push Docker Image') {

            steps {
                script {
                    docker.withRegistry('https://registry.hib.docker.com','docker_hub_login')
                    app.push("${env.BUILD_NUMBER}")
                    app.push("latest")
                }
            }
        }
        stage('Deploy to production') {

            steps {

                input "Deploy to Production?"
                milestone(1)

                script {
                    sh """
                        ssh jenkins@52.90.227.178 <<EOF
                        docker pull rajeev74/catering-quote:${env.BUILD_NUMBER}
                        try {
                            docker stop catering-quote
                            docker rm catering-quote

                        } catch (err) {
                            echo: 'caught error : $err'
                        }

                        docker run --restart always --name catering-quote -p:8080:80 -d rajeev74/catering-quote:${env.BUILD_NUMBER}
                        EOF
                    """.trim()
                    }
                }
            }
        }
        post {
            always {
                cleanWs()
            }
        }
}