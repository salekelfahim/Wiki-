<?php
require_once '../app/Database/Database.php';

class Wiki
{

    private $id;
    private $titre;
    private $auteur;
    private $categorie;
    private $date;
    private $status;
    private $contenu;


  public function getAll()
  {
    $sql = "SELECT * FROM `wiki`";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
    return $result;
  }
  public function getWiki($id)
  {
    $sql = "SELECT * FROM  `wiki` WHERE id = $id";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
  }
  public function addWiki()
  {
    Database::connexion()->getPdo()->beginTransaction();
    $sql = "INSERT INTO `wiki`(`title`, `content`, `date`, `id_utilisateur`, `id_category`) 
              VALUES (?,?,?,?,?)";
    $stmt = Database::connexion()->getPdo()->prepare($sql);
    $stmt->execute([$this->titre, $this->contenu, $this->date, $this->auteur, $this->categorie]);
    if ($stmt) {
      $last_id = Database::connexion()->getPdo()->query('SELECT MAX(id) FROM wiki')->fetchcolumn();
      return $last_id;
    } else {

      return false;
    }
  }
}
