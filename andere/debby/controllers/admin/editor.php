<?php
//MODEL
include_once 'models/Blog_Entry_Table.class.php'; //model inlezen
$entryTable = new Blog_Entry_Table($db); //nieuw object om tabel te genereren, connectie meegeven door var db (zie admin-pagina, daar aangemaakt)
$editorSubmitted = isset ($_POST['action']);
if($editorSubmitted) {
    $buttonClicked = $_POST['action']; //je kunt echo toevoegen om te zien of deze wel degelijk de waarde van action krijgt

    $save = ($buttonClicked === 'Save');
    $id = $_POST['id'];

    //voorwaarden om te bewaren
    $insertNewEntry = ($save AND $id === '0'); //var save moet waarde save hebben en id moet gelijk zijn aan 0 = om nieuwe te kunnen toevoegen

    //voorwaarde om te verwijderen
    $deleteEntry = ($buttonClicked === 'Delete'); //als buttonclicked waarde delete heeft, dan ...

    //voorwaarden om te actualiseren
    $updateEntry = ($save AND $insertNewEntry === false);

    $title = $_POST['title'];
    $entry = $_POST['entry'];

    if($insertNewEntry) {
        $savedEntryID = $entryTable->saveEntry($title, $entry); //methode saveEntry aanroepen (krijgt tussen haakjes mee)
    } elseif ($updateEntry) {
        $entryTable->updateEntry($id,$title,$entry);
        $savedEntryID = $id;
    } elseif ($deleteEntry) {
        $entryTable->deleteEntry($id); //var id komt uit formulier
    }
}

$entryRequested = isset($_GET['id']); //kijken of get var bestaat = wanneer geklikt op titel, en als dat zo is...
if($entryRequested) {
    $id = $_GET['id']; //waarde id in var id steken hier
    $entryData = $entryTable->getEntry($id); //in object entrydata steken. Uit entrytable met behulp methode getentry die parameter id meekrijgt
    $entryData->entry_id = $id;
    $entryData->message = "";
}
$entrySaved = isset($savedEntryID); //komt uit model of uit code die uitgevoerd wordt in geval van update
if($entrySaved) {
    $entryData = $entryTable->getEntry($savedEntryID);
    $entryData->message = "Entry was saved";
}

//VIEW
$editorOutput = include_once 'views/admin/editor-html.php'; //link met editor-html.php

//HOOKING UP
return $editorOutput;