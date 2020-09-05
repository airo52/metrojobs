<?php
/**
 * Created by PhpStorm.
 * User: Dr Specs
 * Date: 3/5/2019
 * Time: 3:54 PM
 */

    include "../core/config.php";
    include "../helpers/helpers.php";
    include "../includes/header.php";
    $Err=array();
    $username=$password='';

session_start();
if (isset($_SESSION['user'])){
    header('Location:home.php');
}



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        if (!empty($_POST['username'])){
            $username=test_input($_POST['username']);
        }else{
            $usernameErr="Username is Required";
            $Err=array($usernameErr);
        }
        if (!empty($_POST['password'])){
            $password1=test_input($_POST['password']);
            $password=md5($password1);
        }else{
            $passwordErr="Password is Required";
            $Err=array($passwordErr);
        }

        if (!empty($username)){

            $sql="SELECT * FROM userAccounts WHERE username='$username'";

            $result=mysqli_query($conn,$sql);

            $user=mysqli_fetch_assoc($result);

            $userCount=mysqli_num_rows($result);

            if ($userCount < 1){
                $usernameErr= "Username does not match our records";
                $Err=array($usernameErr);

            }else if ($password==$user['password']){
                session_start();
                $_SESSION['user']=$username;
                header('location: home.php');

            }else{
                $passwordErr= "Password does not match our records";
                $Err=array($passwordErr);
            }

        }else{
            $usernameErr="Username is Required";
            $Err=array($usernameErr);
        }
    }else{
        $serverErr="Kindly Login To Proceed";
        $Err=array($serverErr);
    }

    ?>
</div>
<div id="body-module">
    <div id="login-module">
        <h2 class="text-info" style="text-align: center">User Portal</h2>
        <h3 class="text-danger" style="text-align: center"><?php
            if (!empty($Err)){
                foreach ($Err as $x)
                {
                    echo '<ul>'.$x.'</ul>';
                }
            }
            ?>
        </h3>
        <form method="post" action="">
            <div class="form-group">
                Enter Username
                <input class="form-control" id="login-input-control" type="text" name="username" placeholder="<?php echo $username;?>" required>
                Enter Password
                <input class="form-control" type="password" name="password" placeholder="" required>
            </div>
            <br>
            <span> You dont have an account? <a href="sign_up.php">Register</a></span>
            <button class="btn" id="submit-btn" type="submit" name="login">Login</button>
        </form>
    </div>
</div>

<?php include "../includes/footer.php";?>

