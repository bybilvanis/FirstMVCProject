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