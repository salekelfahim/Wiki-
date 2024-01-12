<?php

require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/Home.php';



class HomeController
{
    public Router $router;
    public Wiki $wiki;
    
    
    public function __construct()
    {
        $this->router = new Router();
        $this->wiki = new Wiki;
    }
    public function getAllWikis(){
       
        $wikis= new Wiki();
        $getWikis= $wikis->getAll();
    
        return $this->router->renderView('home',  ["getWikis" => $getWikis]);
    }

    
}