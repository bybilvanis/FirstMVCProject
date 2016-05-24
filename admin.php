<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP MySQL Blog Demo";
$pageData->addCSS('css/style.css');
$pageData->content = "<h1>$pageData->title</h1>";

// view
// load navigation
$pageData->content .= include_once 'views/admin/admin-navigation.php';

//welke pagina toevoegen als geklikt wordt
$navigationIsClicked = isset ($_GET['page']);
if ($navigationIsClicked){
    $fileToLoad = $_GET['page'];
} else {
    $fileToLoad = "entries";
}

// load the controller
$pageData->content .= include_once  "controllers/admin/$fileToLoad.php";
$page = include_once 'views/page.php';

// hooking up model - view
echo $page;