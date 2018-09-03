pipeline {
    agent any

    stages {

        stage('Build') {
            steps {

                    script {
                        file = readFile('build.properties')
                        prop=[:]

                        file.split('\n').each { line ->
                            l=line.split("=")
                            prop[l[0]]=l[1]
                        }

                        currentBuild.displayName = "catering-quote." + ${MAJOR_VERSION} + '.' + ${MINOR_VERSION}
                                                                     + ${PATCH_NUMBER} + '.' + ${BUILD_NUMBER}

                        withEnv(['MAJOR_VERSION='+prop["MAJOR_VERSION"],'MINOR_VERSION='+prop["MINOR_VERSION"],
                                    'PATCH_NUMBER='+prop["PATCH_NUMBER"],'BUILD_NUMBER='+prop["BUILD_NUMBER"]]){
                            echo 'Building...'
                            sh 'npm install'
                            sh 'bower install'
                            sh 'composer install'
                            sh 'gulp install-build'
                            sh 'gulp build'
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