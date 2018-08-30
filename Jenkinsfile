pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'Building...'
                sh 'npm install'
                sh 'composer install'
                sh 'gulp'
            }
        }
        stage('Test') {
            steps {
                echo 'Testing before deploy to Stage..'
            }
        }
        stage('Deploy') {
            steps {
                echo 'Deploying to Stage..'
            }
        }
    }
}