<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/9/2019
 * Time: 12:52 PM
 */
    include '../core/config.php';
    include "../includes/header.php";


$alert='';
$Err=array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $UserFullNames=$_POST['UserFullNames'];
    $UserEmail=$_POST['UserEmail'];
    $UserTel=$_POST['UserTel'];
    $Industry=$_POST['job_function'];
    $UserAddress=$_POST['UserAddress'];
    $ResidentialArea=$_POST['ResidentialArea'];


    if (!empty($UserFullNames)) {
        $sql = "SELECT FullName from userProfile WHERE FullName='$UserFullNames'";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

        $userCount = mysqli_num_rows($result);

        if ($userCount < 1) {

            $query = "INSERT INTO userProfile ( 
                              FullName , Industry , Email , 
                              Tel , Address , ResidentialArea) 
                              VALUES ('$UserFullNames','$Industry','$UserEmail',
                              '$UserTel','$UserAddress','$ResidentialArea')";

            if (mysqli_query($conn, $query) == true) {
                session_start();
                $_SESSION['user']=$UserFullNames;
                header('location: create_password.php');
            } else {
                $userErr = 'Creating Company Profile Failed';
                $Err = array($userErr);
            }
        } else {

            $usernameErr = 'User Already Exists &nbsp;<a href="login.php">Click here to Login</a>';
            $Err = array($usernameErr);
        }
    }
}else{
    $serverErr="Create A User Account";
    $Err=array($serverErr);
}
?>
</div>


<div id="body-module">
    <div id="register-module">
        <h3 class="text-danger" style="text-align: center"><?php
            if (!empty($Err)){
                foreach ($Err as $x)
                {
                    echo '<ul>'.$x.'</ul>';
                }
            }else{
                echo $alert;
            }
            ?>
        </h3>
        <form method="post" action="">
            <div class="form-group">
                <input class="form-control" type="text" name="UserFullNames" placeholder="Enter Your Full Names" required>
                <input class="form-control" type="text" name="UserEmail" placeholder="Your Email Address" required>
                <input class="form-control" type="text" name="UserTel" placeholder="Enter Your Tel Number (254..)" required>
                <select class="form-control" name="job_function" >
                    <option value="">All Job Functions</option>
                    <option value="accounting-auditing">Accounting, Auditing &amp; Finance</option>
                    <option value="administrative">Administrative &amp; Office</option>
                    <option value="farming-agriculture">Agriculture &amp; Farming</option>
                    <option value="building-architecture">Building &amp; Architecture</option>
                    <option value="social-services">Community &amp; Social Services</option>
                    <option value="consulting">Consulting &amp; Strategy</option>
                    <option value="creative">Creative &amp; Design</option>
                    <option value="customer-service">Customer Service &amp; Support</option>
                    <option value="engineering">Engineering</option>
                    <option value="food-services-catering">Food Services &amp; Catering</option>
                    <option value="human-resources">Human Resources</option>
                    <option value="it-software">IT &amp; Software</option>
                    <option value="legal">Legal Services</option>
                    <option value="management-business-development">Management &amp; Business Development</option>
                    <option value="marketing-communications">Marketing &amp; Communications</option>
                    <option value="medical-pharmaceutical">Medical &amp; Pharmaceutical</option>
                    <option value="project-management">Project &amp; Product Management</option>
                    <option value="quality-control">Quality Control &amp; Assurance </option>
                    <option value="property-management">Real Estate &amp; Property Management</option>
                    <option value="teaching-training">Research, Teaching &amp; Training</option>
                    <option value="sales">Sales</option>
                    <option value="supply-chain-procurement">Supply Chain &amp; Procurement</option>
                    <option value="trades-services">Trades &amp; Services</option>
                    <option value="transport-logistics">Transport &amp; Logistics</option>
                </select>
                <input class="form-control" type="text" name="UserAddress" placeholder="Enter Your Address e.g. 6 - Chuka" required>
                <input class="form-control" type="text" name="ResidentialArea" placeholder="Your Residential Area" required>
            </div>
            <button class="btn" id="submit-btn" type="submit" name="Register">Register</button>
            <p> Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>


<?php include "../includes/footer.php";?>


