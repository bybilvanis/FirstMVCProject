<?php

class Admin_User {
    
    public function __construct(){
        session_start();
    }
    
    public function isLoggedIn(){
        $sessionIsSet= isset($_SESSION['logged_in']);
        if ($sessionIsSet){
            $output= $_SESSION['logged_in'];
        } else {
            $output= false;
        }
        return $output;
    }
    
    private $loggedIn= false;

    public function login(){
        $_SESSION['logged_in']= true;
    }
    
    public function logout(){
        $_SESSION['logged_in']= false;
    }
}