<?php
$idIsFound= isset($entryId);
if ($idIsFound === false){
    trigger_error('views/comment-form-html.php needs an $entryId');
    exit();
}
return "
<form method='post' id='comment-form' action='index.php?page=blog&amp;id=$entryId'>
    <input type='hidden' name='entry-id' value='$entryId'>
    <label for='user-name'>Your name</label>
        <input type='text' name='user-name'>
    <label for='new-comment'>Your comment</label>
        <textarea name='new-comment'></textarea>
    <input type='submit' value='Post it!'>
</form>
";