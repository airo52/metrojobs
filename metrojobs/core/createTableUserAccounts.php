<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/17/2019
 * Time: 2:25 PM
 */
include 'config.php';

$sql='CREATE TABLE userAccounts (username varchar(10) PRIMARY KEY, password varchar(100) not null,UserID INT(255) NOT NULL)';

if (mysqli_query($conn,$sql)){
    echo 'Table Created Successfully';
}else{
    echo 'Table Not Created';

}