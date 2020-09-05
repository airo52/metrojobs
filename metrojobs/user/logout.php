<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/5/2019
 * Time: 5:00 PM
 */
session_start();
unset($_SESSION['user']);
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header('Location:login.php');
