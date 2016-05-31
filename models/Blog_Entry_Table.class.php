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

    private function makeStatement($sql,$data = NULL) { //makestatement heeft 2 parameters nodig, de ondervraging en de data die de vraagtekens moeten gaan vervangen //standaard gelijkstellen aan 0 voor foutmelding //functie private, want mag alleen binnen klasse gebruikt worden
        $statement = $this->db->prepare($sql);
        try {
            $statement->execute($data); //probeer statement dat voorbereid is uit te voeren en in data te zetten
        } catch (Exception $e) { //anders foutmelding
            $error_msg = "<p>You tried to run this sql: $sql</p>
                          <p>Exception: $e</p>";
            trigger_error($error_msg);
        }
        return $statement;
    }

    //CREATE
    public function saveEntry($title,$entry) { //waar eerst test, test stond moet nu uit editor komen
        $sql = "INSERT INTO blog_entry (entry_title, entry_text) VALUES (?,?)";
        $data = array($title,$entry);
        $this->makeStatement($sql,$data);
        return $this->db->lastInsertId(); //om gegevens weer in editor te plaatsen en voor het saven
    }

    //READ
    public function getAllEntries() { //alle entries, maar van inhoud slechts 150 tekens
        $sql = "SELECT  entry_id, entry_title, 
                SUBSTRING(entry_text, 1, 150) AS intro
                FROM blog_entry";
        $statement = $this->makeStatement($sql);
        return $statement;
    }
    public function getEntry($id) { //parameter opgeven om aan te geven welke bijdrage je wil hebben
        $sql = "SELECT * FROM blog_entry WHERE entry_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql,$data);
        $entry = $statement->fetchObject();
        return $entry; //één entry terugkrijgen
    }
    
    //SEARCH
    public function searchEntry($searchTerm){
        $sql= "SELECT entry_id, entry_title FROM blog_entry
               WHERE entry_title LIKE ?
               OR entry_text LIKE ?";
        $data= array("%$searchTerm%", "%$searchTerm%");
        $statement= $this->makeStatement($sql, $data);
        return $statement;
    }

    //UPDATE
    public function updateEntry($id,$title,$text) {
        $sql = "UPDATE blog_entry SET
                entry_title = ?,
                entry_text = ?
                WHERE entry_id = ?";
        $data = array($title,$text,$id);
        $statement = $this->makeStatement($sql,$data);
        return $statement;
    }

    //DELETE
    public function deleteEntry($id) { //parameter nodig om te weten welke te verwijderen
        $this->deleteCommentsByID($id);
        $sql = "DELETE FROM blog_entry WHERE entry_id = ?";
        $data = array($id);
        $statement = $this->makeStatement($sql,$data);
    }
    private function deleteCommentsByID($id){
        include_once 'models/Comment_Table.class.php';
        $comments= new Comment_Table($this->db);
        $comments->deleteByEntryId($id);
    }

}