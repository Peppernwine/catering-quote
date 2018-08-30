pipeline {
    agent any
    stages {
    currentBuild.description = "#${BUILD_NUMBER}, branch ${BRANCH}"
        stage('Build') {
            steps {
                echo 'Building...'
                sh 'env'
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