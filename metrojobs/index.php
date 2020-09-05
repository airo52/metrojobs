<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/9/2019
 * Time: 11:54 AM
 */
include 'includes/index-header.php';
include 'core/config.php';
include 'helpers/helpers.php';

$Err=array();

$job_function=$location='';
?>

    <div id="site_content" id="body">
        <ul id="content">

        </ul>
        <br>
        <div class="container">
            <div id="section-header"><h1>Metro</h1></div>

        <!-- insert the page content here -->

            <form class="form-group" method="post" action="">
                <h2 class="text-info">Search For A job</h2>
                <div class="row">
                    <select class="form-control col-6" name="job_function" >
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
                    <select class="form-control col-6" name="location">
                        <option value="">All Locations</option>
                        <option value="Kisumu">Kisumu</option>
                        <option value="Nairobi">Nairobi</option>
                        <option value="Mombasa">Mombasa</option>
                        <option value="kericho">Kericho</option>
                        <option value="nakuru">Nakuru</option>
                        <option value="naivasha">Naivasha</option>
                        <option value="lamu">Lamu</option>
                        <option value="malindi">Malindi</option>
                        <option value="busia">Busia</option>
                        <option value="machakos">Machakos</option>
                        <option value="Chuka">Chuka</option>
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn" id="submit-btn">Search</button>
                </div>
            </form>
            <div style="margin-top: 100px;">
                <?php
                if ($_SERVER['REQUEST_METHOD']=='POST'){

                    $job_function=test_input($_POST['job_function']);
                    //                $industry=test_input($_GET['industry']);
                    $location=test_input($_POST['location']);

                    if (!empty($job_function && $location)){

                        $sql="SELECT * FROM jobs WHERE professional_qualification='$job_function' AND location='$location'";
                        $re=mysqli_query($con,$sql);
                        $userCount=mysqli_num_rows($re);

                        if ($userCount >0){
                            echo "<h2 class='text-info'>Search Results:</h2>";

                            while ($row=mysqli_fetch_assoc($re)){
                                $CompanyID=$row['CompanyID'];
                                $query="SELECT * FROM employers WHERE CompanyID='$CompanyID'";
                                $result=mysqli_query($conn,$query);
                                $employerCount=mysqli_num_rows($result);

                                if ($employerCount > 0){
                                    $rows=mysqli_fetch_assoc($result);
                                    echo "
                                        <div class='jumbotron'>
                                            <div class='row'>
                                                <div class='col-4'>Company Name</div>
                                                <div class='col-6'>".strtoupper($rows['CompanyName'])."</div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-4'>Job Function</div>
                                                <div class='col-6'>".strtoupper($row['professional_qualification'])."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Industry</div>
                                                <div class='col-6'>".strtoupper($rows['Industry'])."</div>
                                            </div>
                                             <div class='row'>
                                                <div class='col-4'>Job Location</div>
                                                <div class='col-6'>".strtoupper($row['location'])."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Vacancy From:</div>
                                                <div class='col-6'>".$row['opening_date']." to ".$row['closing_date']."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Apply Job</div>
                                                <div class='col-6'><a href='user/apply_job.php'>Click Here to Apply</a> </div>
                                             </div>
                                        </div>";
                                }


                            }
                        }else{
                            $searchErr="No Search Result Found";
                            $Err=array($searchErr);
                        }


                    }else{

                        $sql="SELECT * FROM jobs";
                        $re=mysqli_query($conn,$sql);
                        $userCount=mysqli_num_rows($re);

                        if ($userCount >0){
                            echo "<h2 class='text-info'>Search Results:</h2>";

                            while ($row=mysqli_fetch_assoc($re)){
                                $CompanyID=$row['CompanyID'];
                                $query="SELECT * FROM employers WHERE CompanyID='$CompanyID'";
                                $result=mysqli_query($conn,$query);
                                $employerCount=mysqli_num_rows($result);

                                if ($employerCount > 0){
                                    $rows=mysqli_fetch_assoc($result);
                                    echo "
                                        <div class='jumbotron'>
                                            <div class='row'>
                                                <div class='col-4'>Company Name</div>
                                                <div class='col-6'>".strtoupper($rows['CompanyName'])."</div>
                                            </div>
                                            <div class='row'>
                                                <div class='col-4'>Job Function</div>
                                                <div class='col-6'>".strtoupper($row['professional_qualification'])."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Industry</div>
                                                <div class='col-6'>".strtoupper($rows['Industry'])."</div>
                                            </div>
                                             <div class='row'>
                                                <div class='col-4'>Job Location</div>
                                                <div class='col-6'>".strtoupper($row['location'])."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Vacancy From:</div>
                                                <div class='col-6'>".$row['opening_date']." to ".$row['closing_date']."</div>
                                             </div>
                                             <div class='row'>
                                                <div class='col-4'>Apply Job</div>
                                                <div class='col-6'><a href='user/apply_job.php'>Click Here to Apply</a> </div>
                                             </div>
                                        </div>";
                                }


                            }
                        }else{
                            $searchErr="No Search Result Found";
                            $Err=array($searchErr);
                        }
                    }

                }?>
                <?php
                if (!empty($Err)){
                    foreach ($Err as $x)
                    {
                        echo '<span class="alert alert-danger">'.$x.'</span>';
                    }
                }
                ?>
            </div>
        </div>
    </div>

<?php include 'includes/footer.php';
