<?php
if (isset($userTable) === false){
    trigger_error('views/admin/user-list-html.php needs on object $userTable');
}
$http=$_SERVER['REQUEST_URI'];
$usersAsHTML = "<h2>All Users</h2>";
$usersAsHTML .= "<ul>";
while($user= $allUsers->fetchObject()){
    $usersAsHTML .= "<li>User email: $user->email <a href='admin.php?page=removeUser?id=$user->admin_id'>delete</a></li>";
}
$usersAsHTML .= "</ul>";
return $usersAsHTML;