<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/25/2019
 * Time: 4:27 AM
 */
include "../core/config.php";
include "../includes/header.php";
include "../helpers/helpers.php";
include "session.php";

$Err=array();
//$MinimumQualification=$WorkExperience=$ExpectedSalary=$CoverLetter='';


//    $job_function=$location='';


    if ($_SERVER['REQUEST_METHOD']=='POST'){

        $sql="SELECT UserID FROM useraccounts WHERE username='$user'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $userCount=mysqli_num_rows($result);

        $userID=$row['UserID'];

        if ($userCount > 0){
            $query="SELECT * FROM userprofile WHERE UserID='$userID'";
            $re=mysqli_query($conn,$query);
            $rows=mysqli_fetch_assoc($re);
            $usersCount=mysqli_num_rows($re);

            if ($usersCount > 0){
                $full_names=$rows['FullName'];
                $email=$rows['Email'];
                $Tel=$rows['Tel'];
            }
        }

        if (isset($_POST['Apply_now'])){
            $UserID=$userID;
            $CompanyID=$_POST['CompanyID'];
            $CompanyName=$_POST['CompanyName'];
            $JobFunction=$_POST['JobFunction'];
            $Industry=$_POST['Industry'];
            $Location=$_POST['Location'];
            $JobID=$_POST['JobID'];
            $UserFullNames=$full_names;
            $UserTelephoneNo=$Tel;
            $UserEmail=$email;
            $MinimumQualification=$_POST['MinimumQualification'];
            $WorkExperience=$_POST['WorkExperience'];
            $ExpectedSalary=$_POST['ExpectedSalary'];
            $CoverLetter=$_POST['CoverLetter'];

            //checks if you have choosen the file (CV)
            if (isset($_FILES['Resume'])){

                $target_dir = "../uploads/";
                $target_file = $target_dir . basename($_FILES["Resume"]["name"]);
                $uploadOk = 1;
                $documentFileType = pathinfo($target_file,PATHINFO_EXTENSION);

                $check = getimagesize($_FILES["Resume"]["tmp_name"]);

                // Check if document file is not an image
                if($check !== false) {
                    $ImageErr="File is an image - " . $check["mime"] . ".";
                    $Err=array($ImageErr);
                    $uploadOk = 0;
                } else {
                    //"File is not an image. meaning it is a document";
                    $uploadOk = 1;
                }

// Check if file already exists
//                if (file_exists($target_file)) {
//                    $fileExistsErr= "Sorry, file already exists.";
//                    $Err=array($fileExistsErr);
//                    $uploadOk = 0;
//                }
// Check file size
                if ($_FILES["Resume"]["size"] > 1000000) {
                    $fileTooLargeErr="Sorry, your file is too large.";
                    $Err=array($fileTooLargeErr);
                    $uploadOk = 0;
                }
// Allow certain file formats
                if($documentFileType != "pdf" && $documentFileType != "docx" && $documentFileType != "doc") {
                    $fileFormatErr= "Sorry, only PDF & word files are allowed.";
                    $Err=array( $fileFormatErr);
                    $uploadOk = 0;
                }
// Check if $uploadOk is set to 0 by an error
                if (!$uploadOk == 0) {
// if everything is ok, try to upload file


                    if (move_uploaded_file($_FILES["Resume"]["tmp_name"], $target_file)) {
                        $fileAlert= "The file ". basename( $_FILES["Resume"]["name"]). " has been uploaded.";
                        $Resume=basename( $_FILES["Resume"]["name"]);

                        $sqlQuery="INSERT INTO applied_jobs (
                                      JobFunction , UserID , CompanyID ,
                                      MinimumQualification , WorkExperience , ExpectedSalary ,
                                      CoverLetter , Resume , JobID 
                                    ) 
                                    VALUES (
                                      '$JobFunction','$UserID','$CompanyID',
                                      '$MinimumQualification','$WorkExperience','$ExpectedSalary',
                                      '$CoverLetter', 'uploads/$Resume','$JobID'
                                    )";
                        $Res=mysqli_query($conn,$sqlQuery);


                        if ($Res){
                            $AppliedJobAlert="Job Application is Successful, Check back later for an Interview Request";
                        }else{
                            $ApplicationErr="Sorry Application Failed. Try Again";
                            $Err=array($ApplicationErr);
                        }



//        $conn=mysqli_connect("localhost","root","","image");
//    if(!$conn){
//        echo "connection not established";
//    }
//    else{
//        $sql="INSERT INTO images(image) VALUES('upload/$image')";
//        if(mysqli_query($conn, $sql)){
//            echo "Document uploaded";
//        }
//        else{
//            echo mysqli_error($conn);
//        }
//    }

                    } else {
                        $fileUploadingErr= "Sorry, there was an error uploading your file.";
                        $Err=array($fileUploadingErr);
                    }
                }
            }
        }
    }else{
        $ApplyToProceedErr="Kindly Apply To View Page";
        $Err=array($ApplyToProceedErr);
    }

?>
        <div id="menubar">
            <ul id="menu">
                <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
                <li><a  href="home.php">Search For A Job</a></li>
                <li class="selected"><a href="">Application SuccessFul</a> </li>
                <li><a href="userprofile.php">View Profile</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div id="site_content">
        <ul id="content">

        </ul>
        <br>
        <div class="container">

            <div class="alert">
                <?php
                if (!empty($Err)){
                    foreach ($Err as $x)
                    {
                        echo '<ul class="alert alert-danger"><li>'.$x.'</li></ul>';
                    }
                }
                if (!empty($AppliedJobAlert)){
                    echo ' <h2 class="text-info">Application Successful</h2>
                            <div class="alert alert-success">'.$AppliedJobAlert.'</div>';
                }
                ?>
        </div>
    </div>
