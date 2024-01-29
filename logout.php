<?php
session_start();
if(isset($_SESSION['auth']))
{
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    $_SEESION['message'] = "Logged Out Successfully";
}

header('Location: login.php');
?>