<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/17/2019
 * Time: 1:34 PM
 */

include 'config.php';

$sql='CREATE TABLE userProfile(UserID INT(255) AUTO_INCREMENT PRIMARY KEY, 
                              FullName VARCHAR(50) NOT NULL ,
                              Industry VARCHAR(20) NOT NULL ,
                              Email VARCHAR(50) NOT NULL UNIQUE KEY,
                              Tel VARCHAR(12) NOT NULL ,
                              Address VARCHAR(50) NOT NULL ,
                              ResidentialArea VARCHAR(10) NOT NULL )';

if (mysqli_query($conn,$sql)){
    echo 'Table Created Successfully';
}else{
    echo 'Table Not Created';

}