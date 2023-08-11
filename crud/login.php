<?php 
require_once 'framework/auth.php';

if(isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if(login($login, $password)) {
        header('Location: index.php');
    } else {
        echo 'Invalid login or password';
    }
}

include 'parts/header.php';
?>
<form method="post">
  <input name="login" placeholder="Username" /><br />
  <input name="password" placeholder="Password" type="password" /><br />
  <input type="submit" value="Login" />
</form>
