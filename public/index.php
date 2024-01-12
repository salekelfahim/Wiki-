<?php

require_once '../app/core/Application.php';


$app = new Application();
Router::get('/',  [HomeController::class, 'getAllWikis']);
// Router::post('/', [HomeController::class, 'getAllWikis']);
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[UserController::class, 'login']);

$app->run(); 