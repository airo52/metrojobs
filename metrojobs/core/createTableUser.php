<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/5/2019
 * Time: 4:10 PM
 */

    include 'config.php';

    $sql='CREATE TABLE users (username varchar(10) PRIMARY KEY, password varchar(100) not null,CompanyID INT(255) NOT NULL)';

    if (mysqli_query($conn,$sql)){
        echo 'Table Created Successfully';
    }else{
        echo 'Table Not Created';

    }