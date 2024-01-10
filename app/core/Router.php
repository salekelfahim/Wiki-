<?php 

namespace App\core;

use App\controllers\HomeController;
use App\controllers\RegisterController;
use App\Controller\_404;
class Router {
    private static $controller ;
    private static $method = "index";
    private static function splitURL() {
        $url = $_GET['url'] ?? 'home';
        $url = trim($url, "/");
    
        return explode("/", $url);
    }
    
    public static function  loadController() {
        $url = self::splitURL();
        $controllerName = ucwords($url[0]) . "Controller";
        $controllerClass = "App\\controllers\\" . $controllerName;
        var_dump($controllerClass);

        if(!empty($url[1])){

                self::$method = $url[1];
        }


        if (class_exists($controllerClass)) {
            self::$controller = new $controllerClass();
            var_dump($controllerClass);
            if(method_exists(self::$controller,self::$method)){
                var_dump(method_exists(self::$controller,self::$method));  
                $url = count($url) > 2 ? array_slice($url, 2) : [];

                call_user_func_array([self::$controller,self::$method],$url);
               
            } else {
        
                // self::$controller = new _404();
            }
        } else {
            // self::$controller = new _404();
        }
    
    }
}