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
    $sql = "SELECT * FROM `wiki` WHERE status = 1 ORDER BY `id` DESC";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
    return $result;
  }
  public function getWiki($id)
  {
    $sql = "SELECT wiki.title,wiki.content, utilisateur.Fname,utilisateur.Lname,category.categoryName
    FROM wiki 
    JOIN category ON wiki.id_category = category.id
    JOIN utilisateur ON wiki.id_utilisateur = utilisateur.id
    WHERE wiki.id = $id";
    $result =  Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
  }
  public function addWiki()
  {
    Database::connexion()->getPdo()->beginTransaction();
    $sql = "INSERT INTO `wiki`(`title`, `content`, `id_utilisateur`, `id_category`) 
              VALUES (?,?,?,?)";
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
    $sql = "SELECT * FROM `wiki` WHERE id_utilisateur = :auteur";

    $conn = Database::connexion()->getPdo();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':auteur', $auteur, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }

  // public function getMytags($auteur)
  // {
  //   $sql = "SELECT tag.tagName from tag 
  //   JOIN tag_wiki ON tag_wiki.id_tag = tag.id
  //   JOIN wiki ON tag_wiki.id_wiki = wiki.id
  //   WHERE wiki.id_utilisateur = :auteur";

  //   $conn = Database::connexion()->getPdo();
  //   $stmt = $conn->prepare($sql);
  //   $stmt->bindParam(':auteur', $auteur, PDO::PARAM_INT);
  //   $stmt->execute();

  //   $result = $stmt->fetchAll(PDO::FETCH_OBJ);

  //   return $result;
  // }

  // public function getMycatgs($auteur)
  // {
  //   $sql = "SELECT * FROM `wiki` JOIN category ON category.id = wiki.id_category WHERE wiki.id_utilisateur = :auteur";

  //   $conn = Database::connexion()->getPdo();
  //   $stmt = $conn->prepare($sql);
  //   $stmt->bindParam(':auteur', $auteur, PDO::PARAM_INT);
  //   $stmt->execute();

  //   $result = $stmt->fetchAll(PDO::FETCH_OBJ);

  //   return $result;
  // }

  public function deleteWiki($id)
  {
    $sql = "DELETE FROM `wiki` WHERE id = $id";
    $result = Database::connexion()->getPdo()->query($sql);
    if ($result) {
      return true;
    }
  }

  public function updateWiki($id)
  {
    $sql = "UPDATE `wiki` SET `title` = ?, `content` = ? WHERE id = ?";
    $stmt = Database::connexion()->getPdo()->prepare($sql);
    $stmt->execute([$this->titre, $this->contenu, $id]);
  }


  public function getArchiveWikis()
  {
    $sql = "SELECT * FROM wiki JOIN utilisateur ON wiki.id_utilisateur = utilisateur.id_user  WHERE wiki.status = 0";
    $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($row) {
      return $row;
    }
  }
  public function unarchive($id)
  {
    $sql = "UPDATE `wiki` SET `status` = 1 WHERE id = :id";
    $stmt = Database::connexion()->getPdo()->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

  public function archive($id)
  {
    $sql = "UPDATE `wiki` SET `status` = 0 WHERE id = :id";
    $stmt = Database::connexion()->getPdo()->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }
  public function getAllw()
  {
    $sql = "SELECT * FROM `wiki` ORDER BY `id` DESC";
    $result =  Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
    if ($result) {
      return $result;
    }
    return $result;
  }

  public function totalWikis()
  {
    $sql = "SELECT COUNT(*) as totalWikis FROM `wiki`";
    return Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
  }

  public function seatchbytitle($title)
  {
    $sql = "SELECT DISTINCT wiki.*
          FROM wiki
          JOIN category ON category.id = wiki.id_category
          JOIN tag_wiki ON tag_wiki.id_wiki = wiki.id
          JOIN tag ON tag_wiki.id_tag = tag.id
          WHERE  tag.tagName LIKE :input
          OR wiki.title LIKE :input
          OR category.categoryName LIKE :input
          AND wiki.status = 1";
    $stmt = Database::connexion()->getPdo()->prepare($sql);
    $stmt->bindValue(':input', '%' . $title . '%', PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }
}
