<?php
require_once 'conn.php';

// MODEL
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL Blog Demo Example";
$pageData->addCSS('css/blog.css');
$pageData->content = "<h1>$pageData->title</h1>";
$pageData->content .= include_once 'controllers/blog.php';

// VIEW
$page = include_once 'views/page.php';

// HOOKING UP
echo $page;