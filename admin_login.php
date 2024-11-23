<?php
    session_start();
 
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/hf.css">
    <link rel="stylesheet" href="css/login.css"> -->

    <!-- font css link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        
      <?php 
      include "css/login.css"; ?>

    </style>

</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php

            include("php/config.php");
            if(isset($_POST['submit'])){
                $email=mysqli_real_escape_string($con,$_POST['a_email']);
                $password=mysqli_real_escape_string($con,$_POST['a_password']);

                $result=mysqli_query($con,"SELECT * FROM admin WHERE a_email='$email' AND a_password='$password'") or die("query failed");
                $row=mysqli_fetch_assoc($result);

                if(is_array($row)&& !empty($row)){
                    $_SESSION['valid']=$row['a_email'];
                    $_SESSION['a_name']=$row['a_name'];
                    $_SESSION['a_address']=$row['a_address'];
                    $_SESSION['a_id']=$row['a_id'];
                    header("Location:admin_home.php");

                }
                else{
                    echo"<div class='message'>
                            <p>wrong username or password!</p>
                        </div> <br> ";
                    echo"<a href='admin_login.php'><button class='btnlogin'>Go Back</button>";
                }
                
            }else{
             ?>
            <h4 class="c4"> Admin Login</h4>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" name="a_email" id="a_email"  required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="a_password" id="a_password" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btnlogin" name="submit" value="Login" required>
                </div>
                <!-- <div class="links">
                    Don't have account? <a href="u_register.php">Sign Up Now</a>
                </div> -->
            </form>
        </div>
        <?php  } ?>
    </div>
</body>
</html>