<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/hf.css">
    <link rel="stylesheet" href="css/login.css"> -->

    <!-- font css link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <style>
        
      <?php 
      include "css/login.css" ?>

    </style>

</head>
<body>
    <div class="container">
        <div class="box form-box">

        <!-- php -->
        <?php
         include("php/config.php");
         if(isset($_POST['submit'])){
            $username=$_POST['username'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $contact=$_POST['contact'];
            $password=$_POST['password'];

            //verifying the unique email
            $verify_query=mysqli_query($con,"SELECT Email FROM volunteers WHERE Email='$email'");

            if(mysqli_num_rows($verify_query) !=0){
                echo"<div class='message'>
                        <p>This email is used, Try another one please!</p>
                    </div> <br> ";
                echo"<a href='javascript:self.history.back()'><button class='btnlogin'>Go Back</button>";
            }
            else{
                mysqli_query($con,"INSERT INTO volunteers(Username,Email,Address,contact,Password) VALUES('$username','$email','$address','$contact','$password')") or die("Error Ocurred");

                echo"<div class='message'>
                        <p>Registration successfully!</p>
                    </div> <br> ";
                echo"<a href='login.php'><button class='btnlogin'>Login Now</button>";
            }
         }
         else{

        ?>
            <h4 class="c4">Volunteer Sign Up</h4>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" placeholder="Username" name="username" id="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" name="email" id="email"  required>
                </div>

                <div class="field input">
                    <label for="username">Address</label>
                    <input type="text" placeholder="Address" name="address" id="address"  required>
                </div>

                <div class="field input">
                    <label for="contact">Contact No</label>
                    <input type="number" placeholder="Contact Number" name="contact" id="contact"  required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" placeholder="Password" name="password" id="password" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btnlogin" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a member? <a href="login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>