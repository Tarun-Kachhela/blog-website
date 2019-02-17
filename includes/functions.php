<?php

include_once("connection.php");
function getAllCategories($condition = 1)
{
    global $connection;
    $sql = "SELECT * FROM categories WHERE $condition";
    $rs = mysqli_query($connection, $sql);
    $i = 0;
    $all_categories = array();

    while ($row = mysqli_fetch_assoc($rs)) {
        $single_cat = array();
        $single_cat['cat_id'] = $row['cat_id'];
        $single_cat['cat_title'] = $row['cat_title'];
        $all_categories[$i] = $single_cat;
        $i++;
    }
    return $all_categories;
}
function getAllUsers($condition = 1)
{
    global $connection;
    $sql = "SELECT * FROM users WHERE $condition";
    $rs = mysqli_query($connection, $sql);
    return $rs;
}
function getAllPost($condition = 1)
{
    global $connection;
    $sql = "SELECT posts.* ,CONCAT(users.first_name,CONCAT(\" \",users.last_name)) as author FROM posts ,users WHERE posts.post_author = users.user_id  AND ($condition)";
    $rs = mysqli_query($connection, $sql);
    return $rs;
}
function getAllComment($condition = 1)
{
    global $connection;
    $sql = "SELECT * FROM comments WHERE $condition";
    $rs = mysqli_query($connection, $sql);
    return $rs;
}
function isLoggedIn(){
    startSession();
    if(isset($_SESSION['username'])){
        return true;
    }

    return false;
}
function startSession(){
    if (session_status() == PHP_SESSION_NONE)
        session_start();
}
?>