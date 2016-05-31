<?php
if (isset($adminFormMessage) === false){
    $adminFormMessage= "";
}
return "
<form method='post' action='admin.php?page=users' id='new-admin-form'>
    <fieldset>
        <legend>Create a new admin user</legend>
        <label for='email'>Email</label>
        <input type='email' name='email' required>
        <label for='password'>Password</label>
        <input type='password' name='password' required>
        <input type='submit' name='new-admin' value='Create user''>
    </fieldset>
    <p id='admin-form-message'>$adminFormMessage</p>
</form>
";