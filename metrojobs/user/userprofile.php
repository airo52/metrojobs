<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/19/2019
 * Time: 2:10 AM
 */

include "../core/config.php";
include "../includes/header.php";
include "session.php";

$Err=array();


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
            $Industry=$rows['Industry'];
            $Email=$rows['Email'];
            $Tel=$rows['Tel'];
            $Address=$rows['Address'];
            $ResidentialArea=$rows['ResidentialArea'];
        }
    }

?>

    <div id="menubar">
        <ul id="menu">
            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
            <li><a  href="home.php">Search For A Job</a></li>
            <li class="selected"><a href="">View Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    </div>
    <div id="site_content">
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-5">
                        <div>
                            <img src="../img/avatars/default.png" alt="Avatar image" style="width: 250px; height: 250px;  border-radius: 125px;">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="row">
                            <div class="col-6">Full Names:</div>
                            <div class="col-6"><?php echo $full_names;?></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">Address:</div>
                            <div class="col-6"><?php echo $Address;?></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">Email:</div>
                            <div class="col-6"><?php echo $Email;?></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">Industry:</div>
                            <div class="col-6"><?php echo strtoupper($Industry);?></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">Telephone No:</div>
                            <div class="col-6"><?php echo $Tel;?></div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-6">Residential Area:</div>
                            <div class="col-6"><?php echo $ResidentialArea;?></div>
                        </div>
                    </div>
                </div>
            </div>
<!--            <div class="row">-->
<!--                <form action="" method="post" enctype="multipart/form-data">-->
<!--                    Change Profile Picture : &nbsp;-->
<!--                    <input type="file">-->
<!--                    <button type="submit" name="sudmit" id="submit-btn" class="btn">Upload Pic</button>-->
<!--                </form>-->
<!--            </div>-->
        </div>
    </div>


<?php include "../includes/footer.php";

