#!/bin/bash

# Fetch Docker Hub credentials from AWS SSM Parameter Store
DOCKERHUB_USERNAME=$(aws ssm get-parameter --name "/dockerhub/username" --with-decryption --query "Parameter.Value" --output text)
DOCKERHUB_PASSWORD=$(aws ssm get-parameter --name "/dockerhub/password" --with-decryption --query "Parameter.Value" --output text)

# Log in to Docker Hub
echo $DOCKERHUB_PASSWORD | docker login --username $DOCKERHUB_USERNAME --password-stdin

# Pull the latest Docker image
docker pull $DOCKERHUB_USERNAME/your_dockerhub_repo_name:latest

# Stop the existing container if it's running
docker stop laravel-app || true
docker rm laravel-app || true

# Run the new container
docker run -d --name laravel-app -p 80:80 $DOCKERHUB_USERNAME/your_dockerhub_repo_name:latest
