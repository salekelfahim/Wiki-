<?php
require_once 'Router.php';
class Application{
    public function run(){
         $callback = Router::getCallback();
         echo $callback;
     }
}