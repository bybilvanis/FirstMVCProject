<?php

class Table
{
    /**
     * @var /PDO
     */
    
    protected $db;

    public function __construct($db) //wanneer ik van klasse nieuwe object maak, gebruik maken van construct
    {
        $this->db = $db; //db-naam staat hier in (simple_blog), ook tabel-naam (blog_entry) en dat er 4 velden zijn (records zouden er ook in staan, nu geen)
    }

    protected function makeStatement($sql,$data = NULL) { //makestatement heeft 2 parameters nodig, de ondervraging en de data die de vraagtekens moeten gaan vervangen //standaard gelijkstellen aan 0 voor foutmelding //functie private, want mag alleen binnen klasse gebruikt worden
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
}