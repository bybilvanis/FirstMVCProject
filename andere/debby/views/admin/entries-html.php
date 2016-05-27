<?php
if(isset($allEntries) == false) {
    trigger_error('views/admin/entries-html.php needs an object $allEntries');
}

$entriesAsHTML = "<ul>";
while($entry = $allEntries->fetchObject()) { //ik krijg één entry als ik uit allentries de methode fetchobject kan doen
    $href="admin.php?page=editor&amp;id=$entry->entry_id"; //controller editor moet ingelezen worden en entry_id wordt ook meegegeven
    $entriesAsHTML .= "<li><a href='$href'>$entry->entry_title</a></li>";
}
$entriesAsHTML .= "</ul>";
return $entriesAsHTML;