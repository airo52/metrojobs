<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/5/2019
 * Time: 3:54 PM
 */

    $host= 'localhost';
    $user='root';
    $password='tony';
    $dbname='metrojobs';

//    error_reporting(0);

    $conn=mysqli_connect($host,$user,$password,$dbname) or die("Connection Failed: &nbsp;".mysqli_connect_error());
