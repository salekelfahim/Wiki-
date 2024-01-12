<?php

require_once '../app/core/Application.php';


$app = new Application();
Router::get('/',  [WikiController::class, 'getAllWikis']);
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[UserController::class, 'login']);
Router::get('/details', [WikiController::class,'getWiki']);

$app->run(); 