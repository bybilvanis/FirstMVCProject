<?php
if (isset($adminFormMessage) === false){
    $adminFormMessage= "";
}
return "
<form method='post' action='admin.php?page=users' id='login-form'>
    <fieldset>
        <legend>Create New Admin User</legend>
        <label for='email'>Email</label>
        <input type='email' name='email' required>
        <label for='password'>Password</label>
        <input type='password' name='password' required>
        <input type='submit' name='login' value='Login'>
    </fieldset>
    <p id='admin-form-message'>$adminFormMessage</p>
</form>
";