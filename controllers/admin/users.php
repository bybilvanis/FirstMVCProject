<?php
// model
include_once 'models/Admin_Table.class.php';

// create new admin
$createNewAdmin= isset($_POST['new-admin']);
if ($createNewAdmin){
    $email= $_POST['email'];
    $password= $_POST['password'];
    $adminTable= new Admin_Table($db);
    try {
        $adminTable->createAdmin($email, $password);
        $adminFormMessage= "New user created for $email.";
    } catch (Exception $e){
        $adminFormMessage= $e->getMessage();
    }
}
// user list
$userTable= new Admin_Table($db);
$allUsers= $userTable->getAllUsers();

// view
$newAdminForm = include_once 'views/admin/new-admin-form-html.php';
$newAdminForm .= include_once 'views/admin/user-list-html.php';

// hooking up
return $newAdminForm;