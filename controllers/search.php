<?php
/**
 * @var /PDO
 */

// model
include_once 'models/Blog_Entry_Table.class.php';
$blogTable= new Blog_Entry_Table($db);

if (isset($_POST['search-term'])){
    $searchTerm= $_POST['search-term'];
    $searchData= $blogTable->searchEntry($searchTerm);
    // view
    $searchOutput = include_once 'views/search-result-html.php';
}

// hooking up
return $searchOutput;