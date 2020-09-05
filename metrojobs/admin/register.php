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

    $CompanyName=$_POST['CompanyName'];
    $NumberOfEmployees=$_POST['NumberOfEmployees'];
    $Industry=$_POST['Industry'];
    $TypeOfEmployer=$_POST['TypeOfEmployer'];
    $ContactPerson=$_POST['ContactPerson'];
    $CompanyEmail=$_POST['CompanyEmail'];
    $CompanyTel=$_POST['CompanyTel'];
    $CompanyAddress=$_POST['CompanyAddress'];
    $County=$_POST['County'];

    if (!empty($CompanyName)) {
        $sql = "SELECT CompanyName from employers WHERE CompanyName='$CompanyName'";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

        $userCount = mysqli_num_rows($result);

        if ($userCount < 1) {

            $query = "INSERT INTO employers (CompanyName,NumberOfEmployees,Industry,TypeOfEmployer,ContactPerson,
                              CompanyEmail,CompanyTel,CompanyAddress,County) VALUES ('$CompanyName','$NumberOfEmployees',
                              '$Industry','$TypeOfEmployer','$ContactPerson','$CompanyEmail','$CompanyTel',
                              '$CompanyAddress','$County')";

            if (mysqli_query($conn, $query) == true) {
                session_start();
                $_SESSION['CompanyName']=$CompanyName;
                header('location: create_password.php');
            } else {
                $adminErr = 'Creating Company Profile Failed';
                $Err = array($adminErr);
            }
        } else {

            $usernameErr = 'Admin Already Exists &nbsp;<a href="login.php">Click here to Login</a>';
            $Err = array($usernameErr);
        }
    }
}else{
    $serverErr="Create An Employer Account";
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
                <input class="form-control" type="text" name="CompanyName" placeholder="Enter Company Name" required>
                <input class="form-control" type="text" name="NumberOfEmployees" placeholder="Number of Employees" required>
                <select class="form-control" name="Industry" required>
                    <option value="">--Select Your Industry--</option>
                    <option value="advertising-marketing">Advertising &amp; Marketing</option>
                    <option value="agriculture-fishing">Agriculture, Fishing &amp; Forestry</option>
                    <option value="automotive-aviation">Automotive &amp; Aviation</option>
                    <option value="banking-finance">Banking, Finance &amp; Insurance</option>
                    <option value="construction">Construction</option>
                    <option value="digital-media-comms">Digital, Media &amp; Communications</option>
                    <option value="education">Education &amp; Training</option>
                    <option value="energy">Energy &amp; Utilities</option>
                    <option value="entertainment-events">Entertainment &amp; Events</option>
                    <option value="government">Government</option>
                    <option value="healthcare">Healthcare</option>
                    <option value="hospitality-hotel">Hospitality &amp; Hotel</option>
                    <option value="internet-telecoms">Internet &amp; Telecommunications</option>
                    <option value="law">Law</option>
                    <option value="enforcement-security">Law Enforcement &amp; Security</option>
                    <option value="operations">Logistics &amp; Transportation</option>
                    <option value="manufacturing">Manufacturing</option>
                    <option value="mining-oil">Mining, Oil &amp; Metals</option>
                    <option value="ngo">NGO</option>
                    <option value="real-estate">Real Estate</option>
                    <option value="hr-recruitment">Recruitment</option>
                    <option value="retail-fmcg">Retail, Fashion &amp; FMCG</option>
                    <option value="technology">Technology</option>
                    <option value="tourism-travel">Travel, Tourism &amp; Leisure</option>
                </select>
                <input class="form-control" type="text" name="TypeOfEmployer" placeholder="Type Of Employer" required>
                <input class="form-control" type="text" name="ContactPerson" placeholder="Enter Contact Person" required>
                <input class="form-control" type="text" name="CompanyEmail" placeholder="Enter Company Email" required>
                <input class="form-control" type="text" name="CompanyTel" placeholder="Enter Company Tel Number (254..)" required>
                <input class="form-control" type="text" name="CompanyAddress" placeholder="Enter Company Address" required>
                <input class="form-control" type="text" name="County" placeholder="County" required>
            </div>
            <button class="btn" id="submit-btn" type="submit" name="Register">Register</button>
            <p> Already have an account? <a href="login.php">Login</a></p>
        </form>
    </div>
</div>


<?php include "../includes/footer.php";?>


