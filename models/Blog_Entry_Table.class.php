<?php

//complete code listing for models/Blog_Entry_Table.class.php
class Blog_Entry_Table {
    private $db;

    //notice there are two underscore characters in __construct
    public function __construct ($db) {
        $this->db= $db;
    }
    public function saveEntry ($title, $entry) {
    $entrySQL = "INSERT INTO blog_entry (entry_title, entry_text )
                 VALUES ('$title', '$entry') ";
    $entryStatement = $this-> db-> prepare ($entrySQL );
        try{
            $entryStatement->execute();
        } catch ( Exception $e ){
            $error_msg = "<p>You tried to run this sql: $entrySQL</p>
                          <p> Exception: $e </p> ";
            trigger_error ($error_msg);
        }
    }
}