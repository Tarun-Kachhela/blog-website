<?php
include_once ("../../includes/functions.php");
function insert($table_name,$table_col , $table_value){
    global $connection;
    $query = "INSERT INTO {$table_name} ({$table_col}) VALUES ({$table_value})";
    mysqli_query($connection,$query);
    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
}
function delete($table_name,$condition){
    global $connection;
    $query = "DELETE FROM $table_name WHERE $condition";
    echo $query;
    mysqli_query($connection,$query);
    if (mysqli_errno($connection)){
        die(mysqli_error($connection));
    }
}
?>