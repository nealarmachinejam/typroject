
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/donate.css"> -->
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/hf.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    <title>static doante</title>
    <style>
        
      <?php include "css/hf.css";
      include "css/donate.css" ?>
    
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
                
            
        </nav>
    </header>
   

    <section class="doca">
        <div class="card">
            <div class="card-image food"></div>
            <p>Food donation is a noble act of kindness,Sharing nourishment, alleviating distress.From surplus to those in need it goes,Bringing hope where hunger grows.n each donation, a meal's embrace,Sustaining lives, spreading grace.</p>
            <!-- <a href="">Donate Food</a> -->
            <button  onclick="">Donate Food</button>
        </div>
        <div class="card">
            <div class="card-image book"></div>
            <p>Book donation sparks the flame of knowledge bright,Illuminating minds with wisdom's light.Pages turned, stories shared, new worlds unfold,In the gift of books, treasures untold.From shelves to hands, a journey profound,Enriching souls, spreading learning around.</p>
            <!-- <a href="">Donate Book</a> -->
            <button onclick="">Donate Books</button>
        </div>
        <div class="card">
            <div class="card-image cloth"></div>
            <p>Cloth donation, a gesture of care,Wrapping warmth in threads we share.From closets to hearts, garments flow,Easing burdens, softening woe.In each fabric, stories woven deep,Bringing comfort to those in need's keep.</p>
            <!-- <a href="">Donate Cloth</a> -->
            <button onclick="">Donate Clothes</button>
        </div>
    </section>

    
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
    <!-- <script src="js/donate.js"></script> -->
    <script>
document.addEventListener('DOMContentLoaded', function() {
    document.body.addEventListener('click', function() {
        // Check if user is logged in (you can adjust this condition based on your login logic)
        var isLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
        
        // If user is not logged in, display notification and redirect to index.php
        if (!isLoggedIn) {
            alert('You need to log in first.');
            window.location.href = 'index.php';
        }
    });
});
</script>
</body>
</html>