<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// connection database
$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser= "root";
$dbPassword= "root";
$db = new PDO ($dbInfo, $dbUser, $dbPassword);
$db-> setAttribute(PDO:: ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
try{
    $db = new PDO($dbInfo, $dbUser, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
} catch (Exception $e){
    $pageData->content .= "<h3>Connection failed!</h3><p>$e</p>";
}

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