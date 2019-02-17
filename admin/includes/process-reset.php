<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 09-02-2019
 * Time: 08:13 PM
 */

include_once ("../../includes/functions.php");

if (isset($_POST['reset_password'])){
    $token = $_POST['token'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    echo $confirm_password;
    if ($password == $confirm_password){
        $rs = getAllUsers("token ='$token'");
        echo mysqli_num_rows($rs);
        if ($row = mysqli_fetch_assoc($rs)){
            $email = $row['email'];
            echo $email;
            $hashed_password = password_hash($password,PASSWORD_DEFAULT);
            $query = "UPDATE users SET password ='$hashed_password',token ='' WHERE email = '$email'";
            mysqli_query($connection,$query);
            header("Location: ../../index.php");

        }
    }else{
        header("Location: ../reset.php?token={$token}");
    }
}