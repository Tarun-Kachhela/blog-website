<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 09-02-2019
 * Time: 07:50 PM
 */

include_once ("admin_function.php");
if (isset($_POST['forgot_password'])){
    $email = $_POST['email'];
    $query = "SELECT * FROM users WHERE email = '$email'";
    $rs = mysqli_query($connection,$query);
    if (mysqli_num_rows($rs) == 1){
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));
        $query = "UPDATE users SET token = '{$token}' WHERE email = '{$email}'";
        $rs = mysqli_query($connection,$query);


        //code to send email
        $to = $email;
        $subject = "Reset Password";


        $message = "To reset your password please click link below <br>";
        $message.= "<a href='http://localhost/php/blog/admin/reset.php?token={$token}'>http://localhost/php/blog/admin/reset.php?token={$token}</a>";
        $header = "From:noreply@cms.com\r\n";
        $header .= "MIME-version: 1.0\r\n";
        $header .= "Content-Type: text/html\r\n";
        if(mail($to,$subject,$message,$header)){
            echo  "sent";

        }else{
            echo "failed";
        }
    }
}