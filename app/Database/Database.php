<?php 

namespace App\database;


use PDO;
use PDOException;

class Database {
  private $host = "localhost";
  private $user = "root";
  private $password = "";
  private $database = "wiki";
  private $conn;

  public function __construct() {
      try {
          $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->password);
          $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          echo 'Connection failed: ' . $e;
          die();
      }
  }

  public function getConnection() {
      return $this->conn;
  }
}