<?php
//MODEL
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);
$allEntries = $entryTable->getAllEntries(); //definiëren var allentries, wanneer krijg ik die allemaal, als ik dit toepas

/*
$oneEntry = $allEntries->fetchObject(); //één entry uit all entries halen en daar methode op loslaten, om te testen
$testOutput = print_r($oneEntry,true);
return "<pre>$testOutput</pre>";
*/

//VIEW
$entriesAsHTML = include_once 'views/admin/entries-html.php'; //view hier uit dit bestand hier gekoppeld



//HOOKING UP
return $entriesAsHTML;