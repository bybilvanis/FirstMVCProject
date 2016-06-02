<?php
include_once '../../conn.php';
include_once '../../models/Admin_Table.class.php';

$id= $_GET['admin_id'];

$removeUser= new Admin_Table($db);
$userToRemove= $removeUser->removeUser($id);

if (isset($id)){
    $userToRemove->execute([$id]);
}

header('location: users.php');