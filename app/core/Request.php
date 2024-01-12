<?php

class Request{
    static public function getPath(){
        return $_SERVER['PATH_INFO'] ?? '/';
    }
    static public function getMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }
}