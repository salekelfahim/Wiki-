<?php
namespace App\core;
namespace App\controllers;

use App\core\Router;
use App\core\Application;



require_once '../app/core/Application.php';
require_once '../app/core/Router.php';
require_once '../app/core/Request.php';


$app = new Application();
Router::get('/', 'home');
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[UserController::class, 'login']);

$app->run(); 