<?php
session_start();
include('includes/header.php'); 
include('config/dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_name, $get_email, $tokon)
{
        //Server settings
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->Host       = 'smtp.example.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'garygaurav1313@gmail.com';
        $mail->Password   = 'I`1$32"bn054';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;                                 
    
        $mail->setFrom('garygaurav1313@gmail.com', $get_name);
        $mail->addAddress($get_email); 

        $mail->isHTML(true);
        $mail->Subject = "Reset Password Notification";

        $email_template = "
            <h2>Hello</h2>
            <h3>You are receiving this email because we received a password reset rewuest for your account.</h3>
            <br/><br/>
            <a href='http://localhost/adminPannel/password-change.php?tokon=$tokon&email=$get_email'>Click Me</a>
        ";
        
        $mail->Body = $email_template;
        // print_r($mail);
        // die();
        $mail->send();
        echo 'Message has been sent';
}


if(isset($_POST['password_reset_link']))
{
    
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $tokon = md5(rand());

    $check_email = "SELECT email FROM users WHERE email = '$email' LIMIT 1";
    // print_r($check_email);
    // die();
    $check_email_run = mysqli_query($con, $check_email);
   
    if(mysqli_num_rows($check_email_run) > 0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_tokon = "UPDATE users SET verify_tokon='$tokon' WHERE email='$get_email' LIMIT 1";
        $update_tokon_run = mysqli_query($con, $update_tokon);
        
        if($update_tokon_run)
        {
            send_password_reset($get_name, $get_email, $tokon);
            $_SESSION['status'] = "We e-mailed you a password reset link";
            header("Location: password-reset.php");
            exit(0);
        }
        else
        {
            $_SESSION['status'] = "SOmething went Wrong. #1";
            header("Location: password-reset.php");
            exit(0);
        }
    }
    else
    {
        $_SESSION['status'] = "No Email Found";
        header("location: password-reset.php");
        exit(0);
    }

}
