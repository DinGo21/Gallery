#!/bin/bash

source .env

if [ $1 = "--fresh" ]; then
	mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD -e\
		"DROP DATABASE $DB_DATABASE;"
fi

mysql -h$DB_HOST -u$DB_USERNAME -p$DB_PASSWORD -e\
	"CREATE DATABASE IF NOT EXISTS $DB_DATABASE;
	CREATE TABLE $DB_DATABASE.posts (
		id INT NOT NULL AUTO_INCREMENT,
		author VARCHAR(65) NOT NULL,
		title VARCHAR(65) NOT NULL,
		imageUrl VARCHAR(255) NOT NULL,
		description TEXT(500) NOT NULL,
		PRIMARY KEY(id)
		);"

