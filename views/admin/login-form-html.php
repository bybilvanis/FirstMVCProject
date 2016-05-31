<?php
if (isset($adminFormMessage) === false){
    $adminFormMessage= "";
}
return "
<form method='post' action='admin.php' id='login-form'>
    <fieldset>
        <legend>Login as admin</legend>
        <label for='email'>Email</label>
        <input type='email' name='email' required>
        <label for='password'>Password</label>
        <input type='text' name='password' required>
        <input type='submit' name='log-in' value='Login'>
    </fieldset>
    <p id='admin-form-message'>$adminFormMessage</p>
</form>
";