<?php

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Routes\Router;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/posts', PostController::class, 'show');

$router->get('/posts/create', PostController::class, 'create');

$router->post('/posts/create', PostController::class, 'create');

$router->get('/posts/update', PostController::class, 'update');

$router->post('/posts/update', PostController::class, 'update');

$router->dispatch();

