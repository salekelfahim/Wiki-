<?php

namespace App\core;
namespace App\controllers;

use App\core\Router;
use App\models\User;
require_once '../app/models/User.php';


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

                $user->setFname($fname);
                $user->setLname($lname);
                $user->setEmail($email);
                $user->setPassword($pwd);
                
                if ($user->signup()) {
                    // $this->router->renderView('login');
                    header("location:login");
                }
                
            }
        }
    }
    public function login() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];

            $user = new User;
            $userlogin = $user->login($email, $pwd);

            if($userlogin){
                // $_SESSION['email']= $userlogin->email;
                $_SESSION['fname']= $userlogin->fname;
                $_SESSION['id_role']=$userlogin->id_role;
                $_SESSION['id']=$userlogin->id;
                if ($_SESSION['id_role']=1){
                    header("Location: dashboardAdmin"); 
                }
                elseif($_SESSION['id_role']=2){
                header("Location:home");
                }
           } else {
            return $this->router->renderView('login');
           }
        } 
    }
}
