<?php
// model
include_once 'models/Comment_Table.class.php';
$commentTable= new Comment_Table($db);

// formulier ingeleverd
$newCommentSubmitted= isset($_POST['new-comment']);
if ($newCommentSubmitted){
    $whichEntry= $_POST['entry-id'];
    $user= $_POST['user-name'];
    $comment= $_POST['new-comment'];
    $commentTable->saveComment($whichEntry,$user,$comment);
}
$allComments= $commentTable->getAllById($entryId);

// view
$comments= include_once 'views/comment-form-html.php';
$comments .= include_once 'views/comments-html.php';

// hooking up
return $comments;