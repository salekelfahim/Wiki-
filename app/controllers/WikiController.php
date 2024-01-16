<?php

require_once '../app/core/Router.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/Categorie.php';
require_once '../app/models/Tag.php';
require_once '../app/models/WikiTag.php';





class WikiController
{
    public Router $router;
    public Wiki $wiki;
    public Tag $tag;
    public Categorie $category;
    
    
    public function __construct()
    {
        $this->router = new Router();
        $this->wiki = new Wiki;
        $this->tag = new Tag;
        $this->category = new Categorie;
        
    }
    public function getAllWikis(){
       
        $wikis= new Wiki();
        $category = new Categorie;
        $getWikis= $wikis->getAll();
        $allcategories = $category->getAllcategories();
        return $this->router->renderView('home',  ["getWikis" => $getWikis, "allcategories" => $allcategories]);
    }

    public function getWiki(){
        $wiki = $this->wiki->getWiki($_GET['id']);
        $tags = $this->tag->getTagswiki($_GET['id']);
        return $this->router->renderView('details',["wiki"=>$wiki,"tags"=>$tags]);
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
        return $this->router->renderView('newwiki',  ["categories" => $categories, "tags" =>$tags]);
    }


    public function getMyWikis(){
        $categories = new Categorie;
        $auteur = $_SESSION['id'];
        $wikis = $this->wiki->getMywikis($auteur);
        // $tags = $this->tag->getMytags($auteur);
        // $categories = $this->category->getMycatgs($auteur);
        $categories = $this->category->getAllCategories();
        $tags = $this->tag->getAllTags();
        return $this->router->renderView('wikispage',["wikis"=>$wikis, "categories" => $categories, "tags" =>$tags]);

        
    }
    

    public function addWiki(){ 
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['tag']) && !empty($_POST['categorie']))
            {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $tags = $_POST['tag'];
                $categorie = $_POST['categorie'];
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

    public function editWiki(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id = $_POST['id'];
            $this->wiki->setTitre($title);
            $this->wiki->setContenu($content);
            $this->wiki->updateWiki($id);
            header('Location: /wikispage');
        }
    }

    public function deletewiki(){
        $id = $_GET['id'];
        $this->wiki->deleteWiki($id);
        header('Location: /wikispage');
    }

    public function search() {
        $title = isset($_GET['title']) ? $_GET['title'] : '';
        $search_wikis = $this->wiki->seatchbytitle($title);
        $category = new Categorie;
        $allcategories = $category->getAllcategories();
        // return $this->router->renderView('search', ['search_wikis' => $search_wikis,"allcategories"=>$allcategories]);
        require_once 'C:\wamp64\www\Wiki-\app\views\search.php';
    }
}

    
