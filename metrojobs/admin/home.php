<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/5/2019
 * Time: 4:26 PM
 */
include "../core/config.php";
include "../includes/header.php";
include "session.php";

$Err=array();
?>
    <div id="menubar">
        <ul id="menu">
            <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
            <li class="selected"><a  href="../admin/home.php">Home</a></li>
            <li><a href="../admin/jobs.php">Post Vacancies</a></li>
            <li><a href="../admin/employers.php">Employer Profile</a></li>
            <li><a href="../admin/logout.php">Logout</a></li>
        </ul>
    </div>
</div>
    <div id="site_content">
        <div class="container">
                <!-- insert the page content here -->
            <div>
                <div id="section-header"><h1>Metro</h1></div>
            </div>
            <br>
            <?php
                $sql="SELECT CompanyID FROM users WHERE username='$employer'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                $CompanyID=$row['CompanyID'];

                if ($result){
                    $query="SELECT * FROM applied_jobs WHERE CompanyID='$CompanyID'";
                    $re=mysqli_query($conn,$query);

                    if(mysqli_num_rows($re) >0){
                        echo "<h2 class='text-info'>Applied Jobs:</h2>";

                        while ($rows=mysqli_fetch_assoc($re)){
                           echo "
                            <div class='jumbotron'>
                                <div class='row'>
                                    <div class='col-5'>Job Function</div>
                                    <div class='col-7'>".$rows['JobFunction']."</div>
                                </div>
                                <div class='row'>
                                    <div class='col-5'>Minimum Qualification</div>
                                    <div class='col-7'>".$rows['MinimumQualification']."</div>
                                </div>
                                <div class='row'>
                                    <div class='col-5'>Work Experience</div>
                                    <div class='col-7'>".$rows['WorkExperience']."</div>
                                </div>
                                <div class='row'>
                                    <div class='col-5'>Expected Salary</div>
                                    <div class='col-7'>".$rows['ExpectedSalary']."</div>
                                </div>
                                <div class='row'>
                                    <div class='col-5'>Cover Letter</div>
                                    <div class='col-7'>".$rows['CoverLetter']."</div>
                                </div>
                                <div class='row'>
                                    <div class='col-5'>Resume</div>
                                    <div class='col-7'><a href='../".$rows['Resume']."' target='_blank'>Click Here to Download CV</a></div>
                                </div>
                            </div>";
                        }

                    }else{
                        $NoAppliedJobErr="No Jobs Applied Yet";
                        $Err=array($NoAppliedJobErr);
                    }
                }
            ?>
            <?php if (!empty($Err)){
            foreach ($Err as $x)
            {
            echo '<ul class="alert alert-danger"><li>'.$x.'</li></ul>';
            }
            }?>

        </div>
    </div>
<?php //include "../includes/footer.php";

