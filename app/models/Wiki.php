<?php
require_once '../app/Database/Database.php';

class Wiki
{

  private $nom;
  private $description;
  private $etat;
  private $date;


  public function getAll()
  {
    $sql = "SELECT * FROM `wiki`";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
      return $result;
  }
  public function getWiki($id){
    $sql = "SELECT * FROM  `wiki` WHERE id = $id";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
        return $result;
    }
}
}