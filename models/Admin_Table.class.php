<?php
include_once 'models/Table.class.php';
/**
 * @var /PDO
 */
class Admin_Table extends Table
{
    // create
    public function createAdmin($email, $password){
        $this->checkMail($email);
        $sql= "INSERT INTO admin (email, password) VALUES (?, md5(?))";
        $data= array($email,$password);
        $this->makeStatement($sql, $data);
    }
    
    // read
    private function checkMail($email){
        $sql="SELECT email FROM admin WHERE email=?";
        $data= array($email);
        $statement= $this->makeStatement($sql,$data);
        if ($statement->rowCount()=== 1){
            $e = new Exception("Error: '$email' already used!");
            throw $e;
        }
    }
    
    public function checkCredentials($email, $password){
        $sql= "SELECT email FROM admin WHERE email=? AND password= MD5(?)";
        $data= array($email, $password);
        $statement= $this->makeStatement($sql, $data);
        if ($statement->rowCount()=== 1){
            $output= true;
        } else {
            $loginProblem= new Exception("Login failed!");
            throw $loginProblem;
        }
    }

    public function getAllUsers(){ //alle entries, maar van inhoud slechts 150 tekens
        $sql = "SELECT  * FROM admin";
        $statement = $this->makeStatement($sql);
        return $statement;
    }
    

    // update

    // delete

    public function removeUser($id){
        $sql= "DELETE FROM admin WHERE admin_id=:admin_id";
        $data= array($id);
        $statement= $this->makeStatement($sql,$data);
        return $statement;
    }
}