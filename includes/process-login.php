<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20-01-2019
 * Time: 09:01 PM
 */
include_once ("connection.php");
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username ='$username'";
    $rs = mysqli_query($connection,$query);
    if($row = mysqli_fetch_assoc($rs)){
        session_start();
        $_SESSION['password'] = $password;
        $_SESSION['role'] = $row['role'];
        $password_db = $row['password'];
        if(password_verify($password,$password_db)){
            $_SESSION['username'] = $row['username'];
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['password'] = $password;
            $_SESSION['image'] = $row['image'];
            header("Location: ../admin/index.php");

        }else{
            header("Location: ../admin/no-access.php");
        }
    }
    else{
        header("Location: ../admin/no-access.php");
    }
}