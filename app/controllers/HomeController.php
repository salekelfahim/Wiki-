<?php

namespace App\controllers;

use App\core\Router;
use App\models\Wiki;
require_once '../app/models/Home.php';
require_once '../app/models/Wiki.php';


class HomeController
{
    public Router $router;
    
    public function __construct()
    {
        $this->router = new Router();
    }
    public function getAllWikis(){
       
        $wikis= new Wiki();
        $getWikis= $wikis->getAll();
        $this->router->renderView('home', ['getWikis' => $getWikis]);
    }
   
    
}