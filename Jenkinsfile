pipeline {
    agent any
    stages {
        stage('Build') {
            steps {
                echo 'Building for Stage..'
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