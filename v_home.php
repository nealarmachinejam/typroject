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
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <!-- <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/v_home.css"> -->
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- font css link -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>volunteer</title>
    <style>             
        <?php 
            include "css/hf.css";
            include "css/sideprofile.css";
            include "css/index.css";         
        ?>
    </style>
</head>
<body>
<?php 

$id=$_SESSION['id'];
$query=mysqli_query($con,"SELECT * FROM volunteers WHERE Id=$id");

while($result=mysqli_fetch_assoc($query)){
    $res_Uname=$result['Username'];
    $res_Email=$result['Email'];
    $res_Address=$result['Address'];
    $res_contact=$result['contact'];
    $res_id=$result['Id'];
}

?>
    <header class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            
                <ul>
                    <li><a href="v_home.php">Home</a></li>
                    <li><a href="new_donation.php">New Donation</a></li>
                    <li><a href="v_about.php">About</a></li>
                    <li><a href="v_contact.php">Contact Us</a></li>
                    <li><a href="v_user_side_cf.php">Crowdfunding</a></li>
                    <li><a href="previous_donation.php">previous donation</a></li>
                    
                    
                </ul>
            
            <img src="img/profile.jpeg"class="user-pic" onclick="toggleMenu()">
            <div class="sub-menu-wrap" id="subMenu">
                <div class="sub-menu">
                    <div class="user-info">
                        <img src="img/profile.jpeg">
                        <h3>ID:<?php echo $res_id; echo " " ;echo $res_Uname?></h3>
                    </div>
                    <hr>
                    
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
        
    <div id="carouselExampleCaptions" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item carousel-image bg-img-1 active">
      <img src="img/slider1.jpeg" class="d-block w-100" height="600vh" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Together, we can turn compassion into action</h5>
        <p>Let your generosity ripple through the world</p>
      </div>
    </div>
    <div class="carousel-item carousel-image bg-img-2">
      <img src="img/slider3.jpeg" class="d-block w-100" height="600vh"  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Sharing is not just about giving, but about making a difference</h5>
        <p>The joy of giving is the greatest gift of all</p>
      </div>
    </div>
    <div class="carousel-item carousel-image bg-img-3">
      <img src="img/slider2.jpeg" class="d-block w-100" height="600vh" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Small acts of kindness, big impacts of change</h5>
        <p> Your One donation can bring countless smiles</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


        <!-- OUR MISSIONS -->
        <div class="mission"><h1><i>OUR MISSIONS</i></h1></div>
        <div class="container_m">
        
        <div class="box_m">
            <h2>Creating an inclusive platform</h2>
            <p>Allows individuals to sign up as volunteers, organizations/NGOs, or donors.</p>
        </div>

        <div class="box_m">
            <h2>Enabling donors to list surplus items</h2>
            <p>Incentivizes consistent contributions through certificates.</p>
        </div>

        <div class="box_m">
            <h2>Empowering volunteers with local knowledge</h2>
            <p>Collect and deliver donations to those in need.</p>
        </div>

        <div class="box_m">
            <h2>Facilitating connections through user-friendly interface</h2>
            <p>Between donors, volunteers, and recipients.</p>
        </div>

        <div class="box_m">
            <h2>Introducing a crowdfunding section</h2>
            <p>Initiate and support charitable campaigns for diverse causes.</p>
        </div>
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
    <!-- bootstrap link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>