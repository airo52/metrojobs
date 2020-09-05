<?php
/**
 * Created by PhpStorm.
 * User: D.coder
 * Date: 3/7/2019
 * Time: 1:57 AM
 */
    include 'config.php';

    $alert='';
    $Err=array();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST['username'])){
        $username=$_POST['username'];
    }else{
        $usernameErr="Username is Required";
        $Err=array($usernameErr);
    }
    if (!empty($_POST['password'])){
        $password=$_POST['password'];

    }else{
        $passwordErr="Password is Required";
        $Err=array($passwordErr);
    }

    if (!empty($username)) {
        $sql = "SELECT username from users WHERE username='$username'";

        $result = mysqli_query($conn, $sql);

        $user = mysqli_fetch_assoc($result);

        $userCount = mysqli_num_rows($result);

        if ($userCount < 1) {

            $query = "INSERT INTO users (username,password) VALUES ('$username','$password')";

            if (mysqli_query($conn, $query) == true) {
                $alert = "Admin Added Successfully<br>";
            } else {
                $adminErr = 'Process Failed';
                $Err = array($adminErr);
            }
        } else {
            $usernameErr = 'Admin Already Exists';
            $Err = array($usernameErr);
        }
    }
}
?>
<div>
    <?php

    ?>
    <form method="post" action="">
        <div>
            <?php
                if (!empty($Err)){
                    foreach ($Err as $x)
                    {
                        echo '<ul>'.$x.'</ul>';
                    }
                }else{
                    echo $alert;
                }
            ?>
            <input type="text" name="username" placeholder="Enter Username" required>
            <input type="password" name="password" placeholder="Enter Password" required>
        </div>
        <button type="submit" name="AddAdmin">Add Admin</button>
    </form>
</div>
