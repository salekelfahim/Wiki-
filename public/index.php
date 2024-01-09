<?php
use App\core\Router;

session_start();
include '../vendor/autoload.php';


$app= new Router;
$app->loadController();