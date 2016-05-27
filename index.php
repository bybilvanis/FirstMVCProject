<?php
require_once 'conn.php';

// model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP MySQL Blog Demo";
$pageData->addCSS('css/style.css');
$pageData->content = "<h1>$pageData->title</h1>";
$pageData->content .= include_once 'controllers/blog.php';

// view
$page = include_once 'views/page.php';

// hooking up
echo $page;