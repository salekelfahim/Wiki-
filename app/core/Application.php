<?php
namespace App\core;
use App\core\Router;


class Application{
    public function run(){
         $callback = Router::getCallback();
         echo $callback;
     }
}