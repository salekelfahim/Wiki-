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
}