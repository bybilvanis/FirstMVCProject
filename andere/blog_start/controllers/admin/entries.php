<?php
//MODEL
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);
$allEntries = $entryTable->getAllEntries();

//VIEW
$entriesAsHTML = include_once 'views/admin/entries-html.php';

//HOOKING UP
return $entriesAsHTML;