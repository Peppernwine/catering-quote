pipeline {
    agent any

    stages {

        stage('Build Docker Image') {
            steps {
                    script {
                        app = docker.build("rajeev74/catering-quote")
                        app.inside {
                            sh 'echo hello'
                        }


                  }
            }
        }
        stage('Push Docker Image') {
            steps {
                script {
                    docker.withRegistry('https://registry.hub.docker.com','docker_hub_login') {
                    app.push("${env.BUILD_NUMBER}")
                    app.push("latest")
                    }
                }
            }
        }
        stage('Deploy to production') {

            steps {

                input "Deploy to Production?"
                milestone(1)


/*
                kubernetesDeploy(
                    kubeconfigId: 'kubeconfig',
                    configs: 'kube-deployment-config.yml',
                    enableConfigSubstitution: true
                )
*/
                script {
                        sh "ssh  -o StrictHostKeyChecking=no jenkins@52.90.227.178 \"docker pull rajeev74/catering-quote:${BUILD_NUMBER}\""
                        try {
                            sh "ssh -o StrictHostKeyChecking=no jenkins@52.90.227.178 \"docker stop catering-quote\""
                            sh "ssh -o StrictHostKeyChecking=no jenkins@52.90.227.178 \"docker rm catering-quote\""
                        } catch (err) {
                            echo: 'caught error : $err'
                        }
                        sh "echo ${env.BUILD_NUMBER}"
                        sh "ssh -o StrictHostKeyChecking=no jenkins@52.90.227.178 \"docker run --restart always --name catering-quote -p:8080:80 -d rajeev74/catering-quote:${BUILD_NUMBER}\""
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