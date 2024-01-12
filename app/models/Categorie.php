<?php
require_once '../Database/Database.php';
class Categorie
{
    private $id;
    private $categorieName;

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCategorieName()
    {
        return $this->categorieName;
    }
    public function setCategorieName($categorieName)
    {
        $this->categorieName = $categorieName;
    }

    public function getAllcategories()
    {
        $sql = "SELECT * FROM `category` ORDER BY `category`.`id_category` ASC limit 4";
        $result = Database::connexion()->getPdo()->query($sql)->fetchAll(PDO::FETCH_OBJ);
        if ($result) {
            return $result;
        }
    }
}
