<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/16/2019
 * Time: 12:56 PM
 */

include 'config.php';

$sql='CREATE TABLE jobs (JobID INT(255) AUTO_INCREMENT PRIMARY KEY, 
                              no_of_vacancies VARCHAR(50) NOT NULL ,
                              work_experience VARCHAR(10) NOT NULL ,
                              professional_qualification VARCHAR(200) NOT NULL ,
                              location VARCHAR(50) NOT NULL ,
                              salary VARCHAR(50) NOT NULL ,
                              opening_date DATE NOT NULL ,
                              closing_date DATE NOT NULL ,
                              CompanyID INT(255) NOT NULL)';

if (mysqli_query($conn,$sql)){
    echo 'Table Created Successfully';
}else{
    echo 'Table Not Created';

}