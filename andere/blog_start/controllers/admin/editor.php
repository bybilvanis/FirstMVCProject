<?php
// MODEL
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);
$editorSubmitted = isset($_POST['action']);
if ($editorSubmitted){
    $buttonClicked = $_POST['action'];
    $save = ($buttonClicked === 'Save');
    $id = $_POST['id'];

    // voorwaarden om te bewaren
    $insertNewEntry = ($save AND $id === '0');
    // voorwaarde om te verwijderen
    $deleteEntry = ($buttonClicked === 'Delete');
    // voorwaarden om te actualiseren
    $updateEntry = ($save AND $insertNewEntry === false);

    $title = $_POST['title'];
    $entry = $_POST['entry'];

    if($insertNewEntry){
        $savedEntryID = $entryTable->saveEntry($title, $entry);
    } elseif ($updateEntry){
        $entryTable->updateEntry($id,$title,$entry);
        $savedEntryID = $id;
    } elseif ($deleteEntry){
        $entryTable->deleteEntry($id);
    }
}

$entryRequested = isset($_GET['id']);
if($entryRequested){
    $id = $_GET['id'];
    $entryData = $entryTable->getEntry($id);
    $entryData->entry_id = $id;
    $entryData->message = "";
}
$entrySaved = isset($savedEntryID);
if($entrySaved){
    $entryData = $entryTable->getEntry($savedEntryID);
    $entryData->message = "Entry was saved";
}
//VIEW
$editorOutput = include_once 'views/admin/editor-html.php';

//HOOKING UP
return $editorOutput;