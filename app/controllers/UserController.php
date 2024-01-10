<?php

namespace App\core;
namespace App\controllers;
namespace App\models;

use App\core\Router;
use App\models\User;

// require_once '../App/models/User.php';
// require_once '../App/core/Router.php';

class UserController
{
    public Router $router;

    public function __construct()
    {
        $this->router = new Router();
    }

    public function signup()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if (!empty($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                
                $pwd = $_POST['pwd'];

                $user = new User;
                var_dump($user);die();
                $user->setFname($fname);
                $user->setLname($lname);
                $user->setEmail($email);
                $user->setPassword($pwd);
                
                if ($user->signup()) {
                    // echo "success";
                    // die();
                }
            }
        }
    }
}