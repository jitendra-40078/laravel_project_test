#!/bin/sh

# Fetch parameters from AWS SSM Parameter Store
DB_HOST=$(aws ssm get-parameter --name "/laravel/db_host" --with-decryption --query "Parameter.Value" --output text)
DB_DATABASE=$(aws ssm get-parameter --name "/laravel/db_database" --with-decryption --query "Parameter.Value" --output text)
DB_USERNAME=$(aws ssm get-parameter --name "/laravel/db_username" --with-decryption --query "Parameter.Value" --output text)
DB_PASSWORD=$(aws ssm get-parameter --name "/laravel/db_password" --with-decryption --query "Parameter.Value" --output text)

# Export parameters as environment variables
export DB_HOST DB_DATABASE DB_USERNAME DB_PASSWORD

# Start PHP-FPM
exec php-fpm
