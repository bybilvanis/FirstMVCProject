<?php
require_once 'conn.php';

//MODEL
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data(); //nieuw object van klasse
$pageData->title = "PHP/MySQL Blog Demo";
$pageData->addCSS('css/blog.css'); //gebruiken van methode addCSS om css toe te voegen
$pageData->content = "<h1>$pageData->title</h1>"; //h1 zelfde titel als pagina

//VIEW
//load navigation
$pageData->content .= include_once 'views/admin/admin-navigation.php'; //nav uit admin-navigation.php
//wat is er geklikt
$navigationIsClicked = isset($_GET['page']); //als GET-var page bestaat, is er geklikt
if($navigationIsClicked) { //als er geklikt is
    $fileToLoad = $_GET['page']; //waarde
} else {
    $fileToLoad = 'entries'; //zonder waarde, moet filetoload de waarde entries krijgen
}
//load controller
$pageData->content .= include_once "controllers/admin/$fileToLoad.php";
$page = include_once 'views/page.php'; //var page definiëren

//HOOKING UP ODEL - VIEW
echo $page;