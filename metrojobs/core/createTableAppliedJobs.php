<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/27/2019
 * Time: 10:42 AM
 */
include 'config.php';

$sql='CREATE TABLE applied_jobs (appliedJobID INT(255) AUTO_INCREMENT PRIMARY KEY, 
                              JobFunction VARCHAR(255) NOT NULL ,
                              UserID VARCHAR(255) NOT NULL ,
                              CompanyID VARCHAR(255) NOT NULL ,
                              MinimumQualification VARCHAR(20) NOT NULL ,
                              WorkExperience VARCHAR(50) NOT NULL ,
                              ExpectedSalary VARCHAR(50) NOT NULL ,
                              CoverLetter VARCHAR(200) NOT NULL ,
                              Resume VARCHAR(200) NOT NULL ,
                              JobID INT(255) NOT NULL)';

if (mysqli_query($conn,$sql)){
    echo 'Table Created Successfully';
}else{
    echo 'Table Not Created';

}