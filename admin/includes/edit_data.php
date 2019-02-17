<?php
/**
 * Created by PhpStorm.
 * User: Raju Methwani
 * Date: 27-12-2018
 * Time: 09:49 AM
 */

echo "h";
include_once ("../../includes/connection.php");
if (isset($_POST['edit_category'])){
    $cat_title = $_POST['cat_title'];
    $cat_id = $_POST['cat_id'];
    echo $cat_id;
    $query = "UPDATE categories SET cat_title = '$cat_title' WHERE cat_id = $cat_id";
    mysqli_query($connection ,$query);
    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
    header("Location: ../categories.php");
}