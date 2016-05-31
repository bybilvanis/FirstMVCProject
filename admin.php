<?php
include_once 'conn.php';
// model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP MySQL Blog Demo";
$pageData->addCSS('css/style.css');
$pageData->addScript('js/editor.js');
$pageData->addScript('js/tinymce/tinymce.min.js');
$pageData->content = "<h1>$pageData->title</h1>";

// view
// load the controller
include_once 'models/Admin_User.class.php';
$admin= new Admin_User();
$pageData->content .= include_once 'controllers/admin/login.php';
if ($admin->isLoggedIn()){
    $pageData->content .= include_once 'views/admin/admin-navigation.php';
    $navigationIsClicked= isset($_GET['page']);
    if ($navigationIsClicked){
        $controller= $_GET['page'];
    } else {
        $controller= "entries";
    }
    $pageData->content .= include_once  "controllers/admin/$controller.php";
}
$page = include_once 'views/page.php';

// hooking up model - view
echo $page;