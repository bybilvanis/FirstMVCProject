<?php
// model
include_once 'models/Admin_Table.class.php';

$userTable= new Admin_Table($db);
$allUsers= $userTable->getAllUsers();

// view
$allUsersHTML= include_once "views/admin/user-list-html.php";

// hooking up
return $allUsersHTML;