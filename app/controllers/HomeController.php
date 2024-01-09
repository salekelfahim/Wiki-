<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Wiki;


class HomeController extends Controller{
    public function index(){
        $wikis= new Wiki();
        $getWikis= $wikis->getAll();
        self::view('home', $getWikis);
    }
    public function edit(){
        
        self::view('home');
    }
    
}