<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>main page</title>
   

    <!--  <link rel="stylesheet" href="css/index.css"> -->
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/style.css"> -->
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <style>
        
      <?php include "css/hf.css";
      include "css/index.css" ?>

    </style>
</head>
<body>
    <header class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="s_donate.php">Donate</a></li>
                    <li><a href="s_about.php">About</a></li>
                    <li><a href="s_contact.php">Contact Us</a></li>
                    <li><a href="s_user_side_cf.php">Crowdfunding</a></li>
                    
                    <!-- <li><a href="user_side_cf.php">Crowdfunding</a></li> -->
                    
                </ul>
                
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Login</button>
                  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="login.php">Volunteer</a></li>
                    <li><a class="dropdown-item" href="u_login.php">Donor</a></li>
                    <li><a class="dropdown-item" href="admin_login.php">Admin</a></li>
                  </ul>
                </div>
                    

            
            <!-- <a href="login.php"><button class="login-button">Volunteer Login</button></a>
            <a href="u_login.php"><button class="login-button">Donor Login</button></a> -->
        </nav>
    </header>
    
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
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
      <img src="img/slider3.jpeg" class="d-block w-100" height="600vh" alt="...">
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
<!-- donate us now and join us now -->
<div class="dv_box">
  <div class="dv"><P>Through charity, we bridge the divide,
Touching lives, side by side.
From the depths of compassion, let it flow,
Transforming lives with every glow</P>
<h3>Be A Donor</h3>
<a href="u_register.php">Donate Us Now</a>
  </div>
  <div class="dv"><p>In giving, we find our truest wealth,
A gift of love, a token of health.
So let us join, in this noble mission,
To uplift, inspire, and bring fruition.</p>
<h3>Be A Volunteer</h3>
<a href="register.php">Join Us Now</a>
</div>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
  // Activate the carousel with auto-slide
  $('.carousel').carousel({
    interval: 1000 // Change interval value as needed (in milliseconds)
  });
</script>
    


</body>
</html>