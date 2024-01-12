<?php
require_once '../app/Database/Database.php';

class Wiki
{

  private $id;
  private $titre;
  private $auteur;
  private $categorie;
  private $status;
  private $contenu;


  public function getId()
  {
    return $this->id;
  }
  public function setId($id)
  {
    $this->id = $id;
  }

  public function getTitre()
  {
    return $this->titre;
  }
  public function setTitre($titre)
  {
    $this->titre = $titre;
  }

  public function getAuteur()
  {
    return $this->auteur;
  }

  public function setAuteur($auteur)
  {
    $this->auteur = $auteur;
  }

  public function getCategorie()
  {
    return $this->categorie;
  }

  public function setCategorie($categorie)
  {
    $this->categorie = $categorie;
  }


  public function getStatus()
  {
    return $this->status;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getContenu()
  {
    return $this->contenu;
  }
  public function setContenu($contenu)
  {
    $this->contenu = $contenu;
  }
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
    $stmt->execute([$this->titre, $this->contenu, $this->auteur, $this->categorie]);
    if ($stmt) {
      $last_id = Database::connexion()->getPdo()->query('SELECT MAX(id) FROM wiki')->fetchcolumn();
      return $last_id;
    } else {

      return false;
    }
  }


  public function getMywikis($auteur)
  {
    $sql = "SELECT * FROM  `wiki` WHERE id_utilisateur = $auteur";
    $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($row) {
      return $row;
    }
  }

  public function deleteWiki($id)
  {
    $sql = "DELETE FROM `wiki` WHERE id = $id";
    $result = Database::connexion()->getPdo()->query($sql);
    if ($result) {
      return true;
    }
  }
}
