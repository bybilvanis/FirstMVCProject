<?php
// model
include_once 'models/Admin_Table.class.php';
$createNewAdmin= isset($_POST['new-admin']);
if ($createNewAdmin){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $adminTable= new Admin_Table($db);
    try {
        $adminTable->createAdmin($email, $password);
        $adminFormMessage= "New user created for <em>$email</em>";
    } catch (Exception $e){
        $adminFormMessage= $e->getMessage();
    }
}

// view
$newAdminForm = include_once 'views/admin/new-admin-form-html.php';

// hooking up
return $newAdminForm;