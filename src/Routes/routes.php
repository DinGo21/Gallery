<?php

use App\Controllers\HomeController;
use App\Routes\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/post', HomeController::class, 'show');

$router->dispatch();

