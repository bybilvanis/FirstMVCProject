<?php
require_once 'conn.php';

// model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP MySQL Blog Demo";
$pageData->addCSS('css/style.css');
$pageData->content = "<h1>$pageData->title</h1>";
$pageData->content .= include_once 'views/search-form-html.php';
$controller= "blog";
$pageRequested= isset($_GET['page']);
if ($pageRequested){
    if ($_GET['page'] === 'search'){
        $controller= 'search';
    }
}
//$pageData->content .= include_once 'controllers/blog.php';
$pageData->content .= include_once "controllers/$controller.php";

// view
$page = include_once 'views/page.php';

// hooking up
echo $page;