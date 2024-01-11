<?php

namespace App\controllers;

use App\core\Controller;
use App\models\Wiki;
require_once '../app/models/Home.php';
require_once '../app/models/Wiki.php';


// class HomeController extends Controller{
//     public function index(){
//         $wikis= new Wiki();
//         $getWikis= $wikis->getAll();
//         self::view('home', $getWikis);
//     }
    // public function register(){
        
    //     self::view('register');
    // }
    
// }