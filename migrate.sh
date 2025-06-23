#!/bin/bash

source .env

if [ $1 = "--fresh" ]; then
    echo "DROP DATABASE $DB_DATABASE;" | mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD
fi

echo "CREATE DATABASE IF NOT EXISTS $DB_DATABASE;" | mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD

echo "CREATE TABLE $DB_DATABASE.posts (
        id INT NOT NULL AUTO_INCREMENT,
        author VARCHAR(65) NOT NULL,
        title VARCHAR(65) NOT NULL,
        imageUrl VARCHAR(255) NOT NULL,
        description TEXT(500) NOT NULL,
        PRIMARY KEY(id)
        );
" | mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD

