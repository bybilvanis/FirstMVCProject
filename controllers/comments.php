<?php
// model
include_once 'models/Comment_Table.class.php';
$commentTable= new Comment_Table($db);
// testing


// view
$comments= include_once 'views/comment-form-html.php';

// hooking up
return $comments;