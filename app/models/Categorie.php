<?php
require_once '../app/Database/Database.php';


class Categorie{
    private $id;
    private $categorieName;

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getCategorieName() {
        return $this->categorieName;
    }
    public function setCategorieName($categorieName) {
        $this->categorieName = $categorieName;
    }



    public function getAllcategories(){
        $sql = "SELECT * FROM `category` ORDER BY `category`.`id` ASC limit 6";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }

    }


    public function addCategorie(){
        $sql = "INSERT INTO `category` (`categoryName`) VALUES (?)";
        $result = Database::connexion()->getPdo()->prepare($sql);
        $result->execute([$this->categorieName]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategorie($id){
        $sql = "DELETE FROM `category` WHERE `id` = '$id'";
        $req = Database::connexion()->getPdo()->prepare($sql);
        $req->execute();
        
    }

    public function updateCategorie($id){
        $sql = "UPDATE `category` SET `categoryName` =? WHERE `id` = '$id'";
        $result = Database::connexion()->getPdo()->prepare($sql);
        $result->execute([$this->categorieName]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function totalCategories(){
        $sql ="SELECT COUNT(*) as totalCategories FROM `category`";
        return Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
    }

    public function getMycatgs($auteur)
  {
    $sql = "SELECT * FROM `wiki` JOIN category ON category.id = wiki.id_category WHERE wiki.id_utilisateur = :auteur";

    $conn = Database::connexion()->getPdo();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':auteur', $auteur, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }
}