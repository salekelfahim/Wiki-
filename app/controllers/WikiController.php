<?php

require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';




class WikiController
{
    public Router $router;
    public Wiki $wiki;
    
    
    public function __construct()
    {
        $this->router = new Router();
        $this->wiki = new Wiki;
    }
    public function getAllWikis(){
       
        $wikis= new Wiki();
        $getWikis= $wikis->getAll();
    
        return $this->router->renderView('home',  ["getWikis" => $getWikis]);
    }

    public function getWiki(){
        $wiki = $this->wiki->getWiki($_GET['id']);
        return $this->router->renderView('details',["wiki"=>$wiki]);
    }

    public function getAllCategories(){
        $category = new Categorie();
        return $category->getAllcategories();
    }
    
    public function getAllTags(){
        $tag = new Tag();
        return $tag->getAllTags();
    }
    
    public function getAllCategoriesTags(){
        $categories = $this->getAllCategories();
        $tags = $this->getAllTags();
        // var_dump($categories);die();
        return $this->router->renderView('addwiki',  ["categories" => $categories, "tags" =>$tags]);
    }


    public function getMyWikis(){
        $auteur = $_SESSION['id'];
        $wikis = $this->wiki->getMywikis($auteur);
        
            return $this->router->renderView('mywiki',["wikis"=>$wikis]);

        
    }
    

    public function addWiki(){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag']) && !empty($_POST['categotie']))
            {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $tags = $_POST['tag'];
                $categorie = $_POST['categotie'];
                $auteur = $_SESSION['id'];
                
                $this->wiki->setAuteur($auteur);
                $this->wiki->setTitre($title);
                $this->wiki->setCategorie($categorie);
                $this->wiki->setContenu($content);
                $id=$this->wiki->addWiki();
                foreach($tags as $tag){
                    $tagWiki = new TagWiki;
                    $tagWiki->setTag($tag);
                    $tagWiki->setWiki($id);
                    $tagWiki->addwikitag();
                }
                header('Location: /');
            }
        }

    }
    public function deletewiki(){
        $id = $_GET['id'];
        $this->wiki->deleteWiki($id);
        header('Location: /MyWikis');
    }
}

    
