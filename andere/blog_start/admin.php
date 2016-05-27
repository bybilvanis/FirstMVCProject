<?php
require_once 'conn.php';

// MODEL
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL Blog Demo";
$pageData->addCSS('css/blog.css');
$pageData->addScript('js/editor.js');
$pageData->content = "<h1>$pageData->title</h1>";

// VIEW
// load navigation
$pageData->content .= include_once 'views/admin/admin-navigation.php';
$navigationIsClicked = isset($_GET['page']);
if($navigationIsClicked){
    $fileToLoad = $_GET['page'];
} else {
    $fileToLoad = 'entries';
}
// load the controller
$pageData->content .= include_once "controllers/admin/$fileToLoad.php";
$page = include_once 'views/page.php';

// HOOKING UP MODEL - VIEW
echo $page;
