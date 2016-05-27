<?php
require_once 'conn.php';

//MODEL
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL Blog Demo Example"; //komt in tabblad
$pageData->addCSS('css/blog.css');
$pageData->content = "<h1>$pageData->title</h1>"; //titel bovenaan pagina
$pageData->content .= include_once 'controllers/blog.php'; //inhoud wordt uitgebreid met blog.php

//VIEW
$page = include_once 'views/page.php';

//HOOKING UP
echo $page;