<?php
require_once '../app/core/Router.php';
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST')   {

            if (!empty($_POST['lname']) && !empty($_POST['fname']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $email = $_POST['email'];
                $pwd = $_POST['pwd'];


                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<script>alert('Please enter a valid email address.');</script>";
                    return $this->router->renderView('signup');
                    exit;
                }
            
                if (strlen($pwd) < 8) {
                    echo "<script>alert('Password must be at least 8 characters.');</script>";
                    return $this->router->renderView('signup');
                    exit;
                }
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
        }else {
            return $this->router->renderView('signup');
        }
    }
    public function login()
    {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $pwd = $_POST['pwd'];
            $user = new User;
            $userlogin = $user->login($email, $pwd);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo "<script>alert('Please enter a valid email address.');</script>";
                return $this->router->renderView('login');
                exit;
            }
        
            if (strlen($pwd) < 8) {
                echo "<script>alert('Invalide Password.');</script>";
                return $this->router->renderView('login');
                exit;
            }
            if ($userlogin) {
                $_SESSION['fname'] = $userlogin->fname;
                $_SESSION['id_role'] = $userlogin->id_role;
                $_SESSION['id'] = $userlogin->id;
                header("Location:/");
            } else {
                return $this->router->renderView('login');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header('Location: /');
    }
}
