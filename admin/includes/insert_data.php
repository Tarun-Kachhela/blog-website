<?php
include_once ("admin_function.php");
function convertToString($item){
    $string_item = "'".$item."'";
    return $string_item;
}
if(isset($_POST['add_category'])){
    $cat_title = $_POST['cat_title'];
    $cat_title = convertToString($cat_title);
    insert("categories","cat_title","{$cat_title}");
    header("Location: ../categories.php");
}
?>