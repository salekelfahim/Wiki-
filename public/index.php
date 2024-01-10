<?php
namespace App\core;
namespace App\controllers;

use App\core\Application;
use App\core\Router;
use App\controllers\UserController;

$app = new Application();
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
// Router::post('/login',[HomeController::class, 'login']);
$app->run();   