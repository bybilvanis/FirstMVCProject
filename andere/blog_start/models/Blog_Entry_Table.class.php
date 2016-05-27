<?php

class Blog_Entry_Table
{
    private $db;
    
    public function __construct($db)
    {
        $this->db = $db;
    }

    private function makeStatement($sql,$data = NULL){
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute($data);
        } catch (Exception $e){
            $error_msg = "<p>You tried to run this sql: $sql</p>
                          <p>Exception: $e</p>";
            trigger_error($error_msg);
        }
        return $statement;
    }
    
//CREATE
    public function saveEntry($title,$entry){
        $sql = "INSERT INTO blog_entry (entry_title,entry_text) VALUES (?,?)";
        $data = array($title,$entry);
        $this->makeStatement($sql,$data);
        return $this->db->lastInsertId();
    }

//READ
    public function getAllEntries(){
        $sql = "SELECT entry_id, entry_title,SUBSTRING(entry_text, 1,150) AS intro
       FROM blog_entry";
        $statement = $this->makeStatement($sql);
        return $statement;
    }
    public function getEntry($id){
        $sql = "SELECT * FROM blog_entry WHERE entry_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql,$data);
        $entry = $statement->fetchObject();
        return $entry;
    }

//UPDATE
    public function updateEntry($id,$title,$text){
        $sql = "UPDATE blog_entry SET entry_title = ?, entry_text = ? WHERE entry_id = ?";
        $data = array($title,$text,$id);
        $statement = $this->makeStatement($sql,$data);
        return $statement;
    }

//DELETE
    public function deleteEntry($id){
        $sql = "DELETE FROM blog_entry WHERE entry_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql,$data);
    }
}