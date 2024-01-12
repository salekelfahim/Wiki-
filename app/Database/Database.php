<?php 

class Database {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $database = "wiki";

  private  $pdo;
  private static $_INSTANCE;

  private function __construct() {
      try {
          $this->pdo = new \PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
          $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      } catch (\PDOException $e) {
          echo "Connection failed: " . $e;
          exit();
      }
  }

  public static function connexion(){
      if(!isset($_INSTANCE)){
              self::$_INSTANCE=new self();
      }
      return self::$_INSTANCE;
  }

 public function getPdo(){
  return $this->pdo;
 } 

 private function __clone(){

 }



}