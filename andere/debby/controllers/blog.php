<?php
//MODEL
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db); //entrytable is nieuw object van klasse, nl. van blogentrytable, die moet verbinding hebben met db

$isEntryClicked = isset($_GET['id']); //als get var naam id heeft, dan...
if($isEntryClicked) { //als die bestaat, dan alleen entry tonen
    $entryId = $_GET['id'];
    $entryData = $entryTable->getEntry($entryId); //getentry moet waarde krijgen
    //view van één entry
    $blogOutput = include_once 'views/entry-html.php';
} else {
    $entries = $entryTable->getAllEntries(); //var entries definiëren, komt uit object entrytable, daarin zit methode getallentries
    //view van alle entries
    $blogOutput = include_once 'views/list-entries-html.php'; //2 var uit url in dit bestand
}

//HOOKING UP
return $blogOutput;


/*
$oneEntry = $entries->fetchObject(); //eerste rij uithalen
$test = print_r($oneEntry, true); //vorm van test
echo "<pre>$test</pre>";
*/