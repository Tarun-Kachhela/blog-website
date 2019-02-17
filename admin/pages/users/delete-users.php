<?php

include_once ("../includes/connection.php");
if (isset($_GET['user_id'])){

    $user_id = $_GET['user_id'];
    include_once ("../includes/functions.php");
    $rs = getAllUsers("user_id=$user_id");
    if($row =mysqli_fetch_assoc($rs)){
        $image = $row['image'];
        unlink("images/users/$image");
    }

    $query = "DELETE FROM users WHERE user_id =$user_id";
    mysqli_query($connection,$query);
    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
    header("Location: users.php");
}