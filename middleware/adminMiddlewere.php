<?php
include('../function/myfunction.php');

if(isset($_SESSION['auth']))
{
    if($_SESSION['role'] != "admin" && $_SESSION['role'] != "sub-admin" )
    {
        redirect("../login.php","You are Not authorized to access this page");
    }
}
else 
{
    redirect("../login.php","Login To Continue");
}
?>