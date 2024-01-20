<?php

require_once '../app/core/Router.php';
require_once '../app/models/Tag.php';
require_once '../app/models/Categorie.php';
require_once '../app/models/Wiki.php';
require_once '../app/models/User.php';

class AdminController
{
    public Router $router;
    public Tag $tag;
    public Categorie $categorie;
    public Wiki $wiki;
    public User $user;
    public function __construct()
    {
        $this->router = new Router();
        $this->tag = new Tag();
        $this->categorie = new Categorie();
        $this->wiki = new Wiki();
        $this->user = new User();
    }

    public function dashboard()
    {
        return $this->router->renderAdminView('dashboard');
    }
    public function getTags()
    {
        $tags = $this->tag->getAlltags();
        return $this->router->renderAdminView('tags', ["tags" => $tags]);
    }

    public function editTag()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'add') {

            $tagName = $_POST['tagName'];
            $this->tag->setTag_name($tagName);
            $this->tag->addTag();

            header('Location: /tags');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'update') {
            $tagName = $_POST['tagName'];
            $id = $_POST['id'];
            $this->tag->setTag_name($tagName);
            $this->tag->setId_tag($id);
            $this->tag->updateTag($id);

            header('Location: /tags');
        }
    }

    public function deleteTag()
    {
        $id = $_GET['id'];
        $this->tag->deleteTag($id);
        header('Location: /tags');
    }


    public function getAllcategories()
    {
        $categories = $this->categorie->getAllcategories();
        return $this->router->renderAdminView('categories', ["categories" => $categories]);
    }

    public function uaCategorie()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'add') {
            $categorieName = $_POST['categoryName'];
            $description = $_POST['description'];
            $this->categorie->setCategorieName($categorieName);
            $this->categorie->addCategorie();

            header('Location: /categories');
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['submit'] == 'update') {
            $categorieName = $_POST['categoryName'];
            $description = $_POST['description'];
            $id = $_POST['id'];
            $this->categorie->setCategorieName($categorieName);
            $this->categorie->updateCategorie($id);

            header('Location: /categories');
        }
    }

    public function deleteCategorie()
    {
        $id = $_GET['id'];
        $this->categorie->deleteCategorie($id);
        header('Location: /categories');
    }

    public function getArchiveWikis()
    {
        $wikis = $this->wiki->getArchiveWikis();
        if (!empty($wikis)) {
            return $this->router->renderAdminView('archive', ["wikis" => $wikis]);
        }
    }
    public function unarchive()
    {
        echo "kdcjoco";
        $id = $_GET['id'];
        $this->wiki->unarchive($id);
        header('Location: /wikisadmin');
    }
    public function archive()
    {
        echo "kdcjoco";
        $id = $_GET['id'];
        $this->wiki->archive($id);
        header('Location: /wikisadmin');
    }

    public function getWikis()
    {
        $wikis = new Wiki();
        $getWikis = $wikis->getAllw();
        if (!empty($getWikis)) {
            return $this->router->renderAdminView('wikisadmin', ["getWikis" => $getWikis]);
        }
    }

    public function analytic(){
        $totalTag = $this->tag->totalTags();
        $totalCategory = $this->categorie->totalCategories();
        $totalWiki = $this->wiki->totalWikis();
        
        $totalUser = $this->user->totalUsers();

        return $this->router->renderAdminView('dashboard',["totalTag"=>$totalTag,"totalCategory"=>$totalCategory,"totalWiki"=>$totalWiki,"totalUser"=>$totalUser]);
    }
}
