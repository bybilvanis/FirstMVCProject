<?php
// model
include_once 'models/Admin_Table.class.php';
$loginFormSubmitted= isset($_POST['log-in']);
if ($loginFormSubmitted){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $adminTable= new Admin_Table($db);
    try {
        $adminTable->checkCredentials($email, $password);
        $admin->login();
    } catch (Exception $e){
        $adminFormMessage= $e->getMessage();
    }
}

$loggingOut= isset($_POST['logout']);
if ($loggingOut){
    $admin->logout();
}

if ($admin->isLoggedIn()){
    $view = include_once 'views/admin/logout-form-html.php';
} else {
    $view = include_once 'views/admin/login-form-html.php';
}
// view
//$view= include_once 'views/admin/login-form-html.php';

// hooking up
return $view;