<?php

class Admin_User
{
    private $loggedIn= false;

    public function isLoggedIn(){
        return $this->loggedIn;
    }

    public function login(){
        $this->loggedIn= true;
    }
    
    public function logout(){
        $this->loggedIn= false;
    }
}