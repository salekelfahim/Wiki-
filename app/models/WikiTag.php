<?php
require_once '../app/Database/Database.php';
class TagWiki{
    private $tag;
    private $wiki;

    public function getTag(){
        return $this->tag;
    }
    public function setTag($tag){
        $this->tag = $tag;
    }

    public function getWiki(){
        return $this->wiki;
    }
    public function setWiki($wiki){
        $this->wiki = $wiki;
    }

    
    public function addwikitag(){
        $sql = "INSERT INTO `tag_wiki`(`id_tag`, `id_wiki`)VALUES (?,?)";
        $stmt = Database::connexion()->getPdo()->prepare($sql);
        $stmt->execute([$this->tag, $this->wiki]);
        if ($stmt) {
            return true;
        }
        else {
            return false;
        }

    }
}