pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'Building...'
                sh 'npm install'
                sh 'bower install'
                sh 'composer install'
                sh 'gulp install-build'
                sh 'gulp build'
                archiveArtifacts artifacts: 'build/'
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