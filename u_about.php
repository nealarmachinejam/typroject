<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location:u_login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/about.css">
    <!-- header and footer css sheet -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">

    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>donor page</title>

    <style>
        
      <?php include "css/hf.css";
      include "css/sideprofile.css"
       ?>
    
    </style>   
</head>
<body>
<?php 

$id=$_SESSION['u_id'];
$query=mysqli_query($con,"SELECT * FROM users WHERE u_id=$id");

while($result=mysqli_fetch_assoc($query)){
    $res_Uname=$result['u_name'];
    $res_Email=$result['u_email'];
    $res_Address=$result['u_address'];
    $res_id=$result['u_id'];
}

?>
<header class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            
                <ul>
                    <li><a href="u_home.php">Home</a></li>
                    <li><a href="u_donate.php">Donate</a></li>
                    <li><a href="u_about.php">About</a></li>
                    <li><a href="u_contact.php">Contact Us</a></li>
                    <li><a href="my_donation.php">My Donation</a></li>
                    <li><a href="user_side_cf.php">Crowdfunding</a></li>
                    
                    
                </ul>
            
            <img src="img/profile.jpeg"class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="img/profile.jpeg">
                        <h3>ID:<?php echo $res_id; echo " " ;echo $res_Uname?></h3>
                    </div>
                    <hr>
                     <!-- <a href="<?php echo "<a href='edit.php?Id=$res_id'>" ?>" class="sub-menu-links">
                        <img src="img/p1.jpg">
                        
                        <p>Edit Profile</p>
                        <span>></span>
                    </a> -->
                    <a href="<?php echo "edit.php?Id=$res_id"; ?>" class="sub-menu-links">
                        <img src="img/p1.jpg">
                        <p>Edit Profile</p>
                        <span>></span>
                    </a>

                    <a href="#" class="sub-menu-links">
                        <img src="img/setting.png">
                        <p>Setting and Privacy</p>
                        <span>></span>
                    </a>

                    <a href="php/logout.php" class="sub-menu-links">
                        <img src="img/logout.png">
                        <p>Logout</p>
                        <span>></span>
                    </a>
                </div>
            </div>
                
            <!-- <a href="login.php"><button class="login-button">Volunteer Login</button></a>
            <a href="u_login.php"><button class="login-button">Donor Login</button></a> -->
        </nav>
    </header>
    <div class="about">
    <p><b>Welcome to ASHA,</b> a compassionate platform dedicated to facilitating donations for those in need. At ASHA, our mission is simple: to bridge the gap between generosity and necessity by connecting donors with individuals requiring assistance.</p>

<p>Our platform empowers individuals and organizations to make a meaningful impact by donating essential items such as food, books, and clothes. Whether it's a surplus of non-perishable goods, gently used clothing, or educational materials, every contribution plays a vital role in supporting our community.</p>

<p>ASHA operates with a team of dedicated volunteers who ensure that donations are efficiently distributed to those who need them most. With their unwavering commitment and compassion, our volunteers work tirelessly to make a positive difference in the lives of others.</p>

<p>At ASHA, we believe in the power of collective kindness and the ability of small gestures to create significant change. Together, we can build a brighter future for individuals and families facing adversity. Join us in our mission to spread hope, compassion, and support to those in need. Together, we can make a difference, one donation at a time.</p>
</div>
<footer>
        <div class="footerContainer">
            <div class="socialIcons">
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-google-plus"></i></a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
            </div>
        </div>
        <div class="footerNav">
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">News</a></li>
                <li><a href="">About</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Our Volunteer</a></li>
            </ul>
        </div>
        <div class="footerBottom">
            <p>Copyright &copy;2024; Designed by <span class="designer">Ajaykumar</span></p>
        </div>
    </footer>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>