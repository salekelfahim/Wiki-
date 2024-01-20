<?php
session_start();
require_once '../app/core/Application.php';



$app = new Application();
Router::get('/',  [WikiController::class, 'getAllWikis']);
Router::get('/registre', 'signup');
Router::post('/registre',[UserController::class, 'signup']);
Router::get('/login', 'login');
Router::post('/login',[UserController::class, 'login']);
Router::get('/details', [WikiController::class,'getWiki']);
Router::get('/logout',[UserController::class, 'logout']);
Router::get('/wikispage', [WikiController::class,'getMyWikis']);
Router::get('/newwiki',[WikiController::class,'getAllCategoriesTags']);
Router::post('/newwiki',[WikiController::class, 'addWiki']);
Router::post('/wikispage',[WikiController::class, 'editWiki']);
Router::get('/delete', [WikiController::class,'deletewiki']);
Router::get('/edit', [WikiController::class,'getWiki']);
Router::get('/dashboard', [AdminController::class,'dashboard']);
Router::get('/wikisadmin', [AdminController::class, 'getWikis']);
Router::get('/UnArchive', [AdminController::class, 'unarchive']);
Router::get('/Archive', [AdminController::class, 'archive']);
Router::get('/categories', [AdminController::class, 'getAllcategories']);
Router::post('/categories', [AdminController::class, 'uaCategorie']);
Router::get('/deleteCategorie', [AdminController::class, 'deleteCategorie']);
Router::get('/tags', [AdminController::class, 'getTags']);
Router::post('/tags', [AdminController::class, 'addTag']);
Router::get('/deleteTag', [AdminController::class, 'deleteTag']);
Router::post('/tags', [AdminController::class, 'editTag']);
Router::get('/dashboard', [AdminController::class,'analytic']);
Router::get('/search', [WikiController::class, 'search']);
$app->run(); 