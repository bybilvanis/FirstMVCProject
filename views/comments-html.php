<?php
$commentsFound = isset($allComments);
if($commentsFound === false){
    trigger_error('views/comments-html.php needs $allComments' );
}
$allCommentsHTML = "<ul id='comments'>";
//iterate through all rows returned from database
while ($commentData = $allComments->fetchObject()) {
//notice incremental concatenation operator .=
//it adds <li> elements to the <ul>
    $allCommentsHTML .= "<li>$commentData->author wrote: on $commentData->date;
                        <p>$commentData->txt</p>
                        </li>
                        <hr>";
}
//notice incremental concatenation operator .=
//it helps close the <ul> element
$allCommentsHTML .= "</ul>";
return $allCommentsHTML;