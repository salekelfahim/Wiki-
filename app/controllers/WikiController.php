<?php

require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';




class WikiController
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

    public function getWiki(){
        $wiki = $this->wiki->getWiki($_GET['id']);
        return $this->router->renderView('details',["wiki"=>$wiki]);
    }

    
}