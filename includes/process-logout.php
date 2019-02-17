<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 20-01-2019
 * Time: 10:12 PM
 */
session_start();
$_SESSION['username'] =null;
$_SESSION['role'] =null;
$_SESSION['image'] =null;
session_unset();
header("Location: ../index.php");