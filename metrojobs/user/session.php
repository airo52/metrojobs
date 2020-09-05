<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/16/2019
 * Time: 2:20 PM
 */
session_start();
if (!isset($_SESSION['user'])){
    header('location:login.php');
}

$user=$_SESSION['user'];



?>