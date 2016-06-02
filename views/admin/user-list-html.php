<?php
if (isset($userTable) === false){
    trigger_error('views/admin/user-list-html.php needs on object $userTable');
}

$usersAsHTML = "<h2>All Users</h2>";
$usersAsHTML .= "<ul>";
while($user= $allUsers->fetchObject()){
    $usersAsHTML .= "<li>User email: $user->email</li>";
}
$usersAsHTML .= "</ul>";
return $usersAsHTML;