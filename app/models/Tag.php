<?php
require_once '../app/Database/Database.php';

class Tag{
    private $id_tag;
    private $tag_name;

    public function getId_tag() {
        return $this->id_tag;
    }
    public function setId_tag($id_tag) {
        $this->id_tag = $id_tag;
    }

    public function getTag_name() {
        return $this->tag_name;
    }
    public function setTag_name($tag_name) {
        $this->tag_name = $tag_name;
    }

    public function getAlltags(){
        $sql = "SELECT * FROM `tag`";
        $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($row) {
            return $row;
        }
    }
    public function addTag(){
        $sql ="INSERT INTO `tag`(`tagName`) VALUES (?)";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->bindValue(1, $this->tag_name);
        $stmt->execute();

    }
    public function deleteTag($id_tag){
        $sql = "DELETE FROM `tag` WHERE `id` = ?";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->bindValue(1, $id_tag);
        $stmt->execute();
    }

    public function updateTag($id_tag){
        $sql = "UPDATE `tag` SET `tagName` =? WHERE `id` =?";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->bindValue(1, $this->tag_name);
        $stmt->bindValue(2, $id_tag);
        $stmt->execute();
    }

    public function totalTags(){
        $sql = "SELECT COUNT(*) as totalTag FROM `tag`";
        return Database::connexion()->getPdo()->query($sql)->fetch(PDO::FETCH_OBJ);
    }

    public function getTagswiki($id){
        $sql = "SELECT tag.tagName from tag 
                JOIN tag_wiki ON tag.id = tag_wiki.id_tag
                JOIN wiki ON tag_wiki.id_wiki = wiki.id
                WHERE wiki.id = $id";
         $row = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
         if ($row) {
             return $row;
         }
    }

    public function getMytags($auteur)
  {
    $sql = "SELECT tag.tagName from tag 
    JOIN tag_wiki ON tag_wiki.id_tag = tag.id
    JOIN wiki ON tag_wiki.id_wiki = wiki.id
    WHERE wiki.id_utilisateur = :auteur";

    $conn = Database::connexion()->getPdo();
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':auteur', $auteur, PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt->fetchAll(PDO::FETCH_OBJ);

    return $result;
  }
}