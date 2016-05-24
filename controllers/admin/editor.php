<?php
// model
include_once 'models/Blog_Entry_Table.class.php';
$entryTable= new Blog_Entry_Table($db);
$editorSubmitted= isset($_POST['action']);
if ($editorSubmitted){
    $buttonClicked = $_POST['action'];
    //was "save" button clicked
    $insertNewEntry = ($buttonClicked === 'Save');
    if ($insertNewEntry) {
        //get title and entry data from editor form
        $title = $_POST['title'];
        $entry = $_POST['entry'];
        //save the new entry
        $entryTable->saveEntry($title, $entry);
    }
}

// view
$editorOutput = include_once 'views/admin/editor-html.php';

// hooking up
return $editorOutput;