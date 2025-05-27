<?php

require 'vendor/autoload.php';

$env = parse_ini_file('.env');

if (!$env) {
	die(".env file not found");
}

$router = require 'src/Routes/routes.php';

