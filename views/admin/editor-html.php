<?php

$entryDataFound = isset($entryData); //bestaan er data van een entry? ja, indien er een object is dat entrydata heet
if($entryDataFound === false) { //zo niet, zelf entrydata aanmaken
    $entryData = new StdClass();
    $entryData->entry_id = 0; //eigenschap definiëren en op 0 zetten
    $entryData->entry_title = "";
    $entryData->entry_text = "";
    $entryData->message = "";
}

return "
    <form method='post' action='admin.php?page=editor' id='editor'> <!-- blij klik wordt er naar controller gegaan --> <!-- ingelezen door editor.php -->
        <input type='hidden' name='id' value='$entryData->entry_id'>
        <fieldset>
            <legend>New Entry Submission</legend>
            <label>Title</label>
            <p id='title-warning'></p>
            <input type='text' name='title' maxlength='150' value='$entryData->entry_title'> <!-- maximale lengte gelijk zetten aan varchar -->
            <label>Entry</label>
            <textarea name='entry'>$entryData->entry_text</textarea> <!-- later RTE erin -->
            <fieldset id='editor-buttons'>
                <input type='submit' name='action' value='Save'> <!-- name is action omdat er moet kunnen toegevoegd, aangepast en verwijderd worden -->
                <input type='submit' name='action' value='Delete'>
                <p id='editor-message'>$entryData->message</p>
            </fieldset>
        </fieldset>
    </form>
    <script type='text/javascript'>
        tinymce.init({
            selector: 'textarea',
            plugins: 'image',
            setup: function(editor) {
              editor.on('change', function(e) {
                updateEditorMessage();
              })
            }
        });
    </script>
";
