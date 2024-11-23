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
            $username=$_POST['u_name'];
            $email=$_POST['u_email'];
            $address=$_POST['u_address'];
            $contact=$_POST['u_contact'];
            $password=$_POST['u_password'];

            //verifying the unique email
            $verify_query=mysqli_query($con,"SELECT u_email FROM users WHERE u_email='$email'");

            if(mysqli_num_rows($verify_query) !=0){
                echo"<div class='message'>
                        <p>This email is used, Try another one please!</p>
                    </div> <br> ";
                echo"<a href='javascript:self.history.back()'><button class='btnlogin'>Go Back</button>";
            }
            else{
                mysqli_query($con,"INSERT INTO users(u_name,u_email,u_address,u_contact,u_password) VALUES('$username','$email','$address','$contact','$password')") or die("Error Ocurred");

                echo"<div class='message'>
                        <p>Registration successfully!</p>
                    </div> <br> ";
                echo"<a href='u_login.php'><button class='btnlogin'>Login Now</button>";
            }
         }
         else{

        ?>
            <h4 class="c4">Donor Sign Up</h4>
            <form action="" method="post">
                <div class="field input">
                    <label for="name">Username</label>
                    <input type="text" placeholder="Username" name="u_name" id="u_name" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" placeholder="Email" name="u_email" id="u_email"  required>
                </div>

                <div class="field input">
                    <label for="address">Address</label>
                    <input type="text" placeholder="Address" name="u_address" id="u_address"  required>
                </div>

                <div class="field input">
                    <label for="contact">Contact No</label>
                    <input type="number" placeholder="contact number" name="u_contact" id="u_contact"  required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type=password placeholder="Password" name="u_password" id="u_password" required>
                </div>

                <div class="field input">
                    <input type="submit" class="btnlogin" name="submit" value="Register" required>
                </div>
                <div class="links">
                    Already a donor? <a href="u_login.php">Sign In</a>
                </div>
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>