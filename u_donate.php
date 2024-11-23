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
    <!-- <link rel="stylesheet" href="css/donate.css"> -->
    <!-- header and footer css sheet -->
    <!-- <link rel="stylesheet" href="css/hf.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
   <title>donor page</title> 
    <style>
        
      <?php include "css/hf.css";
      include "css/donate.css";
      include "css/sideprofile.css"  ?>
    
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
    <section class="df">
    <!-- Food Donation Form -->
    <form id="foodForm" class="donation-form" method="POST" action="donate_process.php">
        <h3>Donate Food</h3>
        <input type="hidden" name="form_type" value="food">

        <label for="food_name">Food Name:</label>
        <input type="text" id="f_name" name="f_name" required>

        <label for="food_quantity">Quantity:</label>
        <input type="number" id="f_quantity" name="f_quantity" required>

        <label for="food_expiry_date">Expiry Date:</label>
        <input type="date" id="f_expiry" name="f_expiry" required>

        <button type="button" onclick="submitForm('foodForm')">Donate</button>
        <button type="button" onclick="closeForm('foodForm')">Close</button>
    </form>

    <!-- book donation form -->
    <form id="booksForm" class="donation-form" method="POST" action="donate_process.php">
        <h3>Donate Books</h3>
        <input type="hidden" name="form_type" value="book">
        

        <label for="book_title">Book Description:</label>
        <input type="text" id="b_title" name="b_title" required>

        <label for="book_quantity">Quantity:</label>
        <input type="number" id="b_quantity" name="b_quantity" required>


        <button type="button" onclick="submitForm('booksForm')">Donate</button>
        <button type="button" onclick="closeForm('booksForm')">Close</button>
    </form>

    <!-- cloth donation form -->
    <form id="clothesForm" class="donation-form" method="POST" action="donate_process.php">
        <h3>Donate Clothes</h3>
        <input type="hidden" name="form_type" value="clothes">
        

        <label for="clothes_type">Type of Clothes:</label>
        <input type="text" id="c_type" name="c_type" required>

        <label for="clothes_quantity">Quantity:</label>
        <input type="number" id="c_quantity" name="c_quantity" required>

        

        <button type="button" onclick="submitForm('clothesForm')">Donate</button>
        <button type="button" onclick="closeForm('clothesForm')">Close</button>
    </form>
    </section>

    <section class="doca">
        <div class="card">
            <div class="card-image food"></div>
            <p>Food donation is a noble act of kindness,Sharing nourishment, alleviating distress.From surplus to those in need it goes,Bringing hope where hunger grows.n each donation, a meal's embrace,Sustaining lives, spreading grace.</p>
            <!-- <a href="">Donate Food</a> -->
            <button onclick="showForm('food')">Donate Food</button>
        </div>
        <div class="card">
            <div class="card-image book"></div>
            <p>Book donation sparks the flame of knowledge bright,Illuminating minds with wisdom's light.Pages turned, stories shared, new worlds unfold,In the gift of books, treasures untold.From shelves to hands, a journey profound,Enriching souls, spreading learning around.</p>
            <!-- <a href="">Donate Book</a> -->
            <button onclick="showForm('books')">Donate Books</button>
        </div>
        <div class="card">
            <div class="card-image cloth"></div>
            <p>Cloth donation, a gesture of care,Wrapping warmth in threads we share.From closets to hearts, garments flow,Easing burdens, softening woe.In each fabric, stories woven deep,Bringing comfort to those in need's keep.</p>
            <!-- <a href="">Donate Cloth</a> -->
            <button onclick="showForm('clothes')">Donate Clothes</button>
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
    <script src="js/donate.js"></script>
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>