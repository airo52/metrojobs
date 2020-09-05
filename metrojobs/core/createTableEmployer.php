<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/9/2019
 * Time: 1:49 PM
 */
include 'config.php';

$sql='CREATE TABLE employers (CompanyID INT(255) AUTO_INCREMENT PRIMARY KEY, 
                              CompanyName VARCHAR(50) NOT NULL ,
                              NumberOfEmployees VARCHAR(10) NOT NULL ,
                              Industry VARCHAR(20) NOT NULL ,
                              TypeOfEmployer VARCHAR(10) NOT NULL ,
                              ContactPerson VARCHAR(50) NOT NULL ,
                              CompanyEmail VARCHAR(50) NOT NULL ,
                              CompanyTel VARCHAR(12) NOT NULL ,
                              CompanyAddress VARCHAR(50) NOT NULL ,
                              County VARCHAR(10) NOT NULL )';

if (mysqli_query($conn,$sql)){
    echo 'Table Created Successfully';
}else{
    echo 'Table Not Created';

}