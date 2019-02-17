<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20-01-2019
 * Time: 09:01 PM
 */

if (isset($_POST['register'])){
//        $post_id = $_POST['post_id'];
    $password = $_POST['password'];

    $password = password_hash($password,PASSWORD_DEFAULT);
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $first_name;
    $image = $_FILES['userImage']['name'];
    $user_image_temp = $_FILES['userImage']['tmp_name'];

    $email = $_POST['email'];
    $role= $_POST['role'];
//    $image = "java.jpeg";
    move_uploaded_file($user_image_temp,"../admin/images/users/$image");
    //insert values
    include_once ("../includes/connection.php");
    $query = "INSERT INTO users (username, password, first_name, last_name, email, image, role) VALUES (?,?,?,?,?,?,?)";

    $ps= mysqli_prepare($connection,$query);

    mysqli_stmt_bind_param($ps,"sssssss",$username, $password, $first_name, $last_name, $email, $image, $role);

    mysqli_stmt_execute($ps);

    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }else{
        header("Location: ../admin/no-access.php");
    }
}