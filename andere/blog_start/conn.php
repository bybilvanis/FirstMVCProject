<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbInfo = "mysql:host=localhost;dbname=simple_blog";
$dbUser = 'root';
$dbPassword = 'root';
$db = new PDO($dbInfo,$dbUser,$dbPassword);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
?>