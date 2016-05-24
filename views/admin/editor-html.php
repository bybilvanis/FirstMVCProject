<?php
return "
<form action='admin.php?page=editor' id='editor'>
    <fieldset>
     <legend>New Entry Submission</legend>
     <label for='title'>Title</label>
     <input type='text' name='title' maxlength='150'>
     <label for='entry'>Entry</label>
     <textarea name='enrty'></textarea>
     <fieldset id='editor-buttons'>
        <input type='submit' name='action' value='Save'>
        <input type='submit' name='action' value='Delete'>
     </fieldset>
    </fieldset>
</form>
";