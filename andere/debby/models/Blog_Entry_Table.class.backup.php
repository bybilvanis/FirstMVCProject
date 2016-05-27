<?php


class Blog_Entry_Table
{
    /**
    * @var /PDO
    */
    
    private $db;

    public function __construct($db) //wanneer ik van klasse nieuwe object maak, gebruik maken van construct
    {
        $this->db = $db; //db-naam staat hier in (simple_blog), ook tabel-naam (blog_entry) en dat er 4 velden zijn (records zouden er ook in staan, nu geen)
    }

//CREATE
    public function saveEntry($title,$entry) { //waar eerst test, test stond moet nu uit editor komen
        $entrySQL = "INSERT INTO blog_entry (entry_title, entry_text) VALUES (?,?)";
        $entryStatement = $this->db->prepare($entrySQL); //methode prepare van entrySQL loslaten
        $formData = array($title,$entry);
        try {
            $entryStatement->execute($formData);
        } catch (Exception $e) {
            $error_msg = "<p>You tried to run this sql: $entrySQL</p>
                         <p>Exception: $e</p>";
            trigger_error($error_msg);
        }
    }

//READ
    public function getAllEntries() { //alle entries, maar van inhoud slechts 150 tekens
        $sql = "SELECT  entry_id, entry_title, 
                SUBSTRING(entry_text, 1, 150) AS intro
                FROM blog_entry";
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute(); //probeer uit te voeren
        } catch (Exception $e) { //anders foutmelding
            $error_msg = "<p>You tried to run this sql: $sql</p>
                          <p>Exception: $e</p>";
            trigger_error($error_msg);
        }
        return $statement;
    }
    public function getEntry($id) { //parameter opgeven om aan te geven welke bijdrage je wil hebben
        $sql = "SELECT * FROM blog_entry WHERE entry_id = ?";
        $statement = $this->db->prepare($sql);
        $data = array($id);
        try {
            $statement->execute($data); //probeer uit te voeren en gebruik gegevens in var data
        } catch (Exception $e) { //anders foutmelding
            $error_msg = "<p>You tried to run this sql: $sql</p>
                         <p>Exception: $e</p>";
            trigger_error($error_msg);
        }
        $entry = $statement->fetchObject();
        return $entry; //één entry terugkrijgen
    }

//UPDATE


//DELETE
}