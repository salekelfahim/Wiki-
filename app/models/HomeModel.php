<?php

namespace App\Model;

use PDO;
use PDOException;

use App\Database\Database;

class HomeModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function findAll()
  {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wiki`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
  }
}
