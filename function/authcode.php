<?php
session_start();
include('../config/dbcon.php');
include('../function/myfunction.php');

if(isset($_POST['register_btn'])){
    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['message'] = "Email already Registerd";
        header('Location: ../register.php');
    }
    else 
    {
        if($password){
            $insert_query = "INSERT INTO users (firstname, lastname, username, email, phone, password) VALUES ('$firstname','$lastname','$username','$email','$phone','$password')";

            $inser_query_run = mysqli_query($con,$insert_query);
            // print_r($inser_query_run);
            // die();
            if($inser_query_run){
                $_SESSION['message'] = "Register Successfully";
                header('Location: ../login.php');
            }else {
                $_SESSION['message'] = "Something went wrong"; 
                header('Location: ../register.php');
            }
        }else{
            $_SESSION['message'] = "Password";
            header('Location: ../register.php');
        }
    }

}
elseif(isset($_POST['login_btn']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE email = '$email' AND password='$password' ";

    $login_query_run = mysqli_query($con, $login_query); 

    if(mysqli_num_rows($login_query_run) > 0)
    {
        $_SESSION['auth'] = true;
        $userdata = mysqli_fetch_array($login_query_run);
        
        $username = $userdata['firstname'];
        $useremail = $userdata['email'];
        $role = $userdata['role'];
        $id = $userdata['id'];
        
        $_SESSION['auth_user']= [
            'firstname' => $username,
            'email' => $useremail,
            'id' => $id,
            'role' => $role
        ];
        $_SESSION['role'] = $role;

        if($_SESSION['auth_user']['role']  == "admin" || $_SESSION['auth_user']['role'] == "sub-admin"){
            redirect("../admin/index.php", "Welcome To Dashboard");
        }
        else 
        {
            redirect("../index.php", "Logged In Successfully");
        }
    }
    else
    {
        redirect("../login.php", "Invalid Credentials");
    }
}