<?php
namespace App\core;

class Request{
    static public function getPath(){
        return $_SERVER['REQUEST_URI'] ?? '/';
    }
    static public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}