<?php
$entryDataFound = isset($entryData);
if($entryDataFound === false) { //als dit niet bestaat
    trigger_error('views/entry-thml.php needs an $entryData object'); //deze foutmelding
}
return "
<article>
    <h1>$entryData->entry_title</h1>
    <div class='date'>$entryData->date_created</div>
    <p>$entryData->entry_text</p>
</article>
";