<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/8/2019
 * Time: 4:44 AM
 */
session_start();
if (!isset($_SESSION['employer'])){
    header('Location:login.php');
}

$employer= $_SESSION['employer'];?>