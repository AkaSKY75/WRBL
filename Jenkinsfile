pipeline {
    agent any
    // We split work into 3 stages
    stages {
        // 1. Checkout the files from Git
        stage ('Prep') {
            steps {
                //checkout scm
			echo 'Already checked out...'
            }
        }
        // 2. Check if 'my-code.c' exists,
        stage ('Build GoLang') {
            steps {
                script {
			git clone https://github.com/golang/go goroot
			cd goroot
			git checkout master
			cd src
			./all.bash
                }
            }
        }
        // 3. Dummy deploy
        // Print a message (only done if the build is stable)
        stage ('Deploy') {
            when { 
                not { 
                    equals expected: 'UNSTABLE', actual: currentBuild.result
                }
            }
            steps {
                echo 'Deploying it gently...'
            }
        }
    }
}