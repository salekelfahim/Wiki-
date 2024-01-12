<?php

require_once '../app/Database/Database.php';


class User extends Database {
    private $id;
    private $fname;
    private $lname;
    private $email;
    private $pwd;
    
    public function __construct() {
        parent::__construct();
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFname() {
        return $this->fname;
    }

    public function setFname($fname) {
        $this->fname = $fname;
    }

    public function getLname() {
        return $this->lname;
    }

    public function setLname($lname) {
        $this->lname = $lname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getPassword() {
        return $this->pwd;
    }

    public function setPassword($password) {
        $this->pwd = $password;
    }   


    public function signup() {
        $hashedPassword = password_hash($this->pwd, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `utilisateur` (`Fname`, `Lname`, `email`, `pwd`, `id_role`) VALUES (?, ?, ?, ?, 2)";
        $stmt = $this->getConnection()->prepare($sql);
        $stmt->execute([$this->fname, $this->lname, $this->email, $hashedPassword]);
        if ($stmt) {
            return true;
        } 
        else {
            return false;
        }

    }
    public function login($email,$pwd){
        $sql = "SELECT * FROM `utilisateur` WHERE email = ?";
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute([$email]);
        $result = $stm->fetchObject();
        if ($result && password_verify($pwd, $result->pwd)) {
            return $result;
        } else {
            return false; 
        }
    }
}