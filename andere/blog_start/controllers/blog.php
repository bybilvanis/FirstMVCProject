<?php
//MODEL
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);

$isEntryClicked = isset($_GET['id']);
if($isEntryClicked){
    $entryId = $_GET['id'];
    $entryData = $entryTable->getEntry($entryId);
    // view one entry
    $blogOutput = include_once 'views/entry-html.php';
} else {
    $entries = $entryTable->getAllEntries();
    // view all entries
    $blogOutput = include_once 'views/list-entries-html.php';
}
//HOOKING UP
return $blogOutput;
