<?php
$searchDataFound= isset($searchData);
if ($searchDataFound === false){
    trigger_error('views/search-result-html.php needs $searchData');
}
$searchHTML= "<section id='search'>
                <p>You search for <em>$searchTerm</em></p>
                <ul>";
while ($searchRow = $searchData->fetchObject()){
    $href= "index.php?page=blog&amp;id=$searchRow->enrty_id";
    $searchHTML .= "<li>
                        <a href='$href'>$searchRow->entry_title</a>
                    </li>";
}
$searchHTML .= "</ul>
              </section>";
return $searchHTML;