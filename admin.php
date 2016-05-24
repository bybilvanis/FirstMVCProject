<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// model
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP MySQL Blog Demo";
