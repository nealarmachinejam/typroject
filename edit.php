<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>change profile</title>
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/login.css">
    <!-- font css link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<!-- <header class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png"></a>
            <div class="nav-links">
                <ul>
                    
                    <a href="#">change Profile</a>
                    <a href="php/logout.php"><button class="btnlogin">Log Out</button></a>
                
                </ul>
                
            </div>
        </nav>
    </header> -->
<div class="container">
        <div class="box form-box">
            <?php
                if(isset($_POST['submit'])){
                    $username=$_POST['username'];
                    $email=$_POST['email'];
                    $address=$_POST['address'];

                    $id=$_SESSION['id'];

                    $edit_query=mysqli_query($con,"UPDATE volunteers SET Username='$username',Email='$email',Address='$address' WHERE Id=$id") or die("error occurred");

                    if($edit_query){
                        echo"<div class='message'>
                        <p>Profile updated successfully</p>
                    </div> <br> ";
                echo"<a href='v_home.php'><button class='btnlogin'>Go Home</button>";
                    }

                }else{

                    $id=$_SESSION['id'];
                    $query=mysqli_query($con,"SELECT * FROM volunteers WHERE Id=$id");

                    while($result=mysqli_fetch_assoc($query)){
                        $res_Uname=$result['Username'];
                        $res_Email=$result['Email'];
                        $res_Address=$result['Address'];

                    }
                
            ?>
            <h4>Change Profile</h4>
            <form action="" method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?php echo $res_Uname;?>" autocomplete="off"required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" 
                    value="<?php echo $res_Email;?>" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="username">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $res_Address;?>" autocomplete="off" required>
                </div>

                

                <div class="field input">
                    <input type="submit" class="btnlogin" name="submit" value="update" required>
                </div>
                
            </form>
        </div>
        <?php } ?>
    </div>
</body>
</html>