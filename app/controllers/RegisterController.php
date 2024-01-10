<?php

namespace App\controllers;

use App\core\Controller;


class RegisterController extends Controller
{
    
    public function index()
    {
        self::view('register');
    }

    
}
