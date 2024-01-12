<?php
require_once '../app/Database/Database.php';

class Wiki
{
  private $db;

  private $nom;
  private $description;
  private $etat;
  private $date;


  public function __construct()
  {
    $this->db = new Database();
  }
  public function getAll()
  {
    $conn = $this->db->getConnection();
    $sql = "SELECT * FROM `wiki`";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    
      return $result;
    
  }
  public function getWiki($id){
    $sql = "SELECT * FROM  `wiki` WHERE id = $id";
    $conn = $this->db->getConnection();
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}
}