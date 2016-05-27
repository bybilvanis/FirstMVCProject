<?php
$entryDataFound = isset($entryData);
if($entryDataFound === false){
    trigger_error('views/entry-html.php needs an $entryData  object');
}
return "
<article>
    <h1>$entryData->entry_title</h1>
    <div class='date'>$entryData->date_created</div>
    <p>$entryData->entry_text</p>
</article>
";