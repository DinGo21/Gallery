<?php

namespace App\Routes;

use App\Controllers\HomeController;
use App\Controllers\PostController;

$router = new Router();

$router->get('/', HomeController::class, 'index');

$router->get('/posts', PostController::class, 'index');

$router->get('/posts/{id}', PostController::class, 'show');

$router->get('/posts/create', PostController::class, 'create');

$router->post('/posts/create', PostController::class, 'create');

$router->get('/posts/{id}/update', PostController::class, 'update');

$router->post('/posts/{id}/update', PostController::class, 'update');

$router->post('/posts/{id}/delete', PostController::class, 'delete');

$router->dispatch();

