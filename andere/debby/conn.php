<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

//verbinding met DB = dit kan in conn.php gezet worden
$dbInfo = "mysql:host=localhost;dbname=simple_blog"; //fout invullen om te testen of er foutmelding komt
$dbuser = 'root';
$dbPassword = 'root';
$db = new PDO($dbInfo, $dbuser,$dbPassword); //PDO = php data-objecten
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); //nu hebben we een object, daarop attributen
?>
