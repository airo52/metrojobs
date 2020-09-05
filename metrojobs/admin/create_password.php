<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/9/2019
 * Time: 4:56 PM
 */
    include "../core/config.php";
    include "../includes/header.php";

    session_start();
    if (!isset($_SESSION['CompanyName'])){
        header('Location:register.php');
    }

    $CompanyName=$_SESSION['CompanyName'];

    $Err=array();

    if ($_SERVER['REQUEST_METHOD']=='POST'){
//       validating username
        if (!empty($_POST['username'])){
            $username=$_POST['username'];
       }else{
           $usernameErr="Username is Required";
           $Err=array($usernameErr);
       }
//validating passwords
       if (!empty($_POST['password1'] && $_POST['password2'])){
           $password1=$_POST['password1'];
           $password2=$_POST['password2'];

           if ($password1==$password2){
               //encrypting password
               $password=md5($password1);
           }else{
               $passwordErr="Passwords Do not Match";
               $Err=array($passwordErr);
           }
       }else{
           $passwordErr="Password is Required";
           $Err=array($passwordErr);
       }
        if (!empty($password)){

            $sql="SELECT CompanyID from employers WHERE CompanyName='$CompanyName'";

            $result=mysqli_query($conn,$sql);
            $user=mysqli_fetch_assoc($result);
            $userCount=mysqli_num_rows($result);

            $CompanyID=$user['CompanyID'];

            if ($userCount > 0){

                $query="INSERT INTO users (username,password,CompanyID) VALUES ('$username','$password','$CompanyID') ";
                $re=mysqli_query($conn,$query);
                if ($re) {
                    session_start();
                    $_SESSION['employer']=$username;
                    header('location: home.php');
                } else {
                    $adminErr = 'Failed To create Password';
                    $Err = array($adminErr);
                }

            }else{
                $companyErr="Company Name Not Found";
                $Err=array($companyErr);
            }

        }



    }

?>
</div>
<div id="body-module">
    <div id="login-module">
        <h3 class="text-danger" style="text-align: center"><?php
            if (!empty($Err)){
                foreach ($Err as $x)
                {
                    echo '<ul>'.$x.'</ul>';
                }
            }
            ?>Employer Portal
        </h3>
        <form method="post" action="">
            <div class="form-group">
                <h3 class="text-info" style="text-align: center">Welcome <?php echo $CompanyName; ?> Complete Creating Your Account</h3>
                <input class="form-control" type="text" name="username" placeholder="Create Username" required>
                <input class="form-control" type="password" name="password1" placeholder="Create Password" required>
                <input class="form-control" type="password" name="password2" placeholder="Confirm Password" required>
            </div>
            <button id="submit-btn" type="submit" name="login">Employer Login</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php";?>


