<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/16/2019
 * Time: 2:20 PM
 */
include "../core/config.php";
include "../includes/header.php";
include "../helpers/helpers.php";
include "session.php";



$Err=array();

$job_function=$location='';

?>
<div id="menubar">
    <ul id="menu">
        <!-- put class="selected" in the li tag for the selected page - to highlight which page you're on -->
        <li class="selected"><a  href="home.php">Search For A Job</a></li>
        <li><a href="userprofile.php">View Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
</div>

<div id="site_content">
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

                                echo "  <div class='jumbotron'>
                                           <form method='post' action='apply_job.php' enctype='multipart/form-data' class='form-group'>
                                                <div class='row'>
                                                    <div class='col-4'>Company Name</div>
                                                    <input type='text' name='CompanyName' value='".strtoupper($rows['CompanyName'])."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Company ID</div>
                                                    <input type='text' name='CompanyID' value='".$CompanyID."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Job Function</div>
                                                     <input type='text' name='JobFunction' value='".strtoupper($row['professional_qualification'])."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Industry</div>
                                                    <input type='text' name='Industry' value='".strtoupper($rows['Industry'])."' class='col-6 form-control'>
                                                </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Job Location</div>
                                                    <input type='text' name='Location' value='".strtoupper($row['location'])."' class='col-6 form-control'>
                                                 </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Vacancy From:</div>
                                                    <div class='col-6'>".$row['opening_date']." to ".$row['closing_date']."</div>
                                                 </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Apply Job(".$row['JobID'].")</div>
                                                    <input type='text' name='JobID' value='".strtoupper($row['JobID'])."' class='col-6 form-control'>
                                                 </div>
                                                 <div class='form-group'>
                                                    <label for='MinimumQualification'>Minimum Qualification</label>
                                                    <select class='form-control' name='MinimumQualification' id='MinimumQualification' required>
                                                       <option value=''>-- Select --</option>
                                                        <option value='Bachelor'>Bachelor</option>
                                                        <option value='Certificate'>Certificate</option>
                                                        <option value='Diploma'>Diploma</option>
                                                        <option value='Highschool'>High School</option>
                                                        <option value='Masters'>Masters</option>
                                                        <option value='PHD'>PHD</option>
                                                        <option value='Postgrad'>Postgrad</option>
                                                        <option value='Unspecified'>Unspecified</option>
                                                    </select>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='work_experience'>Years Of Experience</label>
                                                    <select class='form-control' id='work_experience' name='WorkExperience' required>
                                                        <option value=''>-- Select --</option>
                                                        <option value='0-1'> 0 - 1 Year(s)</option>
                                                        <option value='2-3'> 2 - 3 Years</option>
                                                        <option value='4plus'>4 Years and above</option>
                                                    </select>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='Salary'>Monthly Salary Expectation
                                                        <span class='blockquote-footer'>(In Kenya Shillings)</span>
                                                    </label>
                                                    <input type='text' class='form-control' id='Salary' name='ExpectedSalary' required>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='CoverLetter'>Cover Letter
                                                        <span class='blockquote-footer'>(Not more than 200 words)</span>
                                                    </label>
                                                    <textarea class='form-control' id='CoverLetter' rows='3' name='CoverLetter' required></textarea>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='resume'>Attach CV
                                                        <span class='blockquote-footer'>Kindly name your CV in this format: &nbsp; CV.YourFullName</span>
                                                    </label>
                                                    <input type='file' class='form-control-file' id='resume' name='Resume' required>
                                                </div>
                                                <button type='submit' id='submit-btn' class='btn' name='Apply_now'>Apply Now</button>
                                                <p class='blockquote-footer'>
                                                    By clicking 'Apply Now', you agree to our <a href='' target='_blank'>Terms &amp; Conditions</a> and
                                                    <a href='' target='_blank'>Privacy Policy</a>
                                                </p>
                                            </form>      
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

                                echo "  <div class='jumbotron'>
                                           <form method='post' action='apply_job.php' enctype='multipart/form-data' class='form-group'>
                                                <div class='row'>
                                                    <div class='col-4'>Company Name</div>
                                                    <input type='text' name='CompanyName' value='".strtoupper($rows['CompanyName'])."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Company ID</div>
                                                    <input type='text' name='CompanyID' value='".$CompanyID."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Job Function</div>
                                                     <input type='text' name='JobFunction' value='".strtoupper($row['professional_qualification'])."' class='col-6 form-control'>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-4'>Industry</div>
                                                    <input type='text' name='Industry' value='".strtoupper($rows['Industry'])."' class='col-6 form-control'>
                                                </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Job Location</div>
                                                    <input type='text' name='Location' value='".strtoupper($row['location'])."' class='col-6 form-control'>
                                                 </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Vacancy From:</div>
                                                    <div class='col-6'>".$row['opening_date']." to ".$row['closing_date']."</div>
                                                 </div>
                                                 <div class='row'>
                                                    <div class='col-4'>Apply Job(".$row['JobID'].")</div>
                                                    <input type='text' name='JobID' value='".strtoupper($row['JobID'])."' class='col-6 form-control'>
                                                 </div>
                                                 <div class='form-group'>
                                                    <label for='MinimumQualification'>Minimum Qualification</label>
                                                    <select class='form-control' name='MinimumQualification' id='MinimumQualification' required>
                                                       <option value=''>-- Select --</option>
                                                        <option value='Bachelor'>Bachelor</option>
                                                        <option value='Certificate'>Certificate</option>
                                                        <option value='Diploma'>Diploma</option>
                                                        <option value='Highschool'>High School</option>
                                                        <option value='Masters'>Masters</option>
                                                        <option value='PHD'>PHD</option>
                                                        <option value='Postgrad'>Postgrad</option>
                                                        <option value='Unspecified'>Unspecified</option>
                                                    </select>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='work_experience'>Years Of Experience</label>
                                                    <select class='form-control' id='work_experience' name='WorkExperience' required>
                                                        <option value=''>-- Select --</option>
                                                        <option value='0-1'> 0 - 1 Year(s)</option>
                                                        <option value='2-3'> 2 - 3 Years</option>
                                                        <option value='4plus'>4 Years and above</option>
                                                    </select>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='Salary'>Monthly Salary Expectation
                                                        <span class='blockquote-footer'>(In Kenya Shillings)</span>
                                                    </label>
                                                    <input type='text' class='form-control' id='Salary' name='ExpectedSalary' required>
                                             </div>
                                             <div class='form-group'>
                                                    <label for='CoverLetter'>Cover Letter
                                                        <span class='blockquote-footer'>(Not more than 200 words)</span>
                                                    </label>
                                                    <textarea class='form-control' id='CoverLetter' rows='3' name='CoverLetter' required></textarea>
                                                </div>
                                                <div class='form-group'>
                                                    <label for='resume'>Attach CV
                                                        <span class='blockquote-footer'>Kindly name your CV in this format: &nbsp; CV.YourFullName</span>
                                                    </label>
                                                    <input type='file' class='form-control-file' id='resume' name='Resume' required>
                                                </div>
                                                <button type='submit' id='submit-btn' class='btn' name='Apply_now'>Apply Now</button>
                                                <p class='blockquote-footer'>
                                                    By clicking 'Apply Now', you agree to our <a href='' target='_blank'>Terms &amp; Conditions</a> and
                                                    <a href='' target='_blank'>Privacy Policy</a>
                                                </p>
                                            </form>      
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

            if (!empty($jobSearched)){
                echo '<span class="alert alert-danger">'.count($jobSearched).'</span>';
            }
            ?>
        </div>
    </div>
</div>
