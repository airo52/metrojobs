<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/25/2019
 * Time: 6:17 AM
 */
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $Alert= "File is an image - " . $check["mime"] . ".";

        $uploadOk = 1;
    } else {
        $falseImgErr= "File is not an image.";
        $Err=array($falseImgErr);
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $imgErr="Sorry, file already exists.";
    $Err=array($imgErr);
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $imgSizeErr= "Sorry, your file is too large.";
    $Err=array($imgSizeErr);
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $supportedImgTypeErr= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $Err=array($supportedImgTypeErr);
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $imgUploadErr="Sorry, your file was not uploaded.";
    $Err=array($imgUploadErr);
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $alertSuccess= "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        $imgErrUploading="Sorry, there was an error uploading your file.";
        $Err=array($imgErrUploading);
    }
}