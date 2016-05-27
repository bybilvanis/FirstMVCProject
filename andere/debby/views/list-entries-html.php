<?php
$entriesFound = isset($entries); //dit object nodig, dus controleren of het er is
if($entriesFound === false) {
    trigger_error('views/list-entries-html.php needs an object $entries');
}

$entriesHTML = "<ul id='blog-entries'>"; //al id meegeven om later op te maken
while($entry = $entries->fetchObject()) { //tabel rij per rij afgaan, als ik uit entries object methode fetchobject kan uitvoeren, dan heb ik een entry
    $href = "index.php?page=blog&amp;id=$entry->entry_id"; //in tabel is er een eigenschap die entries->entry_id heet //in de url staan 2 variabelen
    $entriesHTML .= "<li>
                        <h2>$entry->entry_title</h2>
                        <div>$entry->intro
                            <p><a href='$href'>Read more</a></p>
                        </div>
                    </li>";
}
$entriesHTML .= "</ul>";
return $entriesHTML;