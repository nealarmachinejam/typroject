<?php
session_start();
// Include database configuration file
include("php/config.php");

// Check if user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: u_login.php");
    exit; // Terminate script after redirection
}

// Retrieve pending food donations
$sql_food = "SELECT * FROM food WHERE status IN ('accepted', 'rejected')";
$result_food = mysqli_query($con, $sql_food);

// Retrieve pending book donations
$sql_books = "SELECT * FROM book WHERE status IN ('accepted', 'rejected')";
$result_books = mysqli_query($con, $sql_books);

// Retrieve pending clothes donations
$sql_clothes = "SELECT * FROM clothes WHERE status IN ('accepted', 'rejected')";
$result_clothes = mysqli_query($con, $sql_clothes);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="css/about.css">-->
    <!-- header and footer css sheet -->
    <!--<link rel="stylesheet" href="css/style.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    
    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>volunteer</title>

    <style>
        
      <?php include "css/hf.css";
            include "css/new_donation.css";
            include "css/sideprofile.css";
       ?>
        
    .location{
        border-radius: 5px;
        border: 1px solid #b32222;
        
    }
    .send{
        border-radius: 5px;
        padding-left: 4px;
        padding-right: 4px;
        color: white;
        background-color: #f44336;
        border: 1px solid #b32222;
        transition: background-color 0.3s;
    }
    .send:hover {
    background-color: #d32f2f;
    }
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
    <div class="donation-label">
        <div class="food-donation">
    <h1 class="label">New Food Donations</h1>
    <table>
        <thead>
            <tr>
                <th>Donation ID</th>
                <th>Donor ID</th>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Expiry Date</th>
                <th>Status</th>
                <th>Location</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_food)) : ?>
                <tr>
                    <td><?php echo $row['f_id']; ?></td>
                    <td><?php echo $row['u_id']; ?></td>
                    <td><?php echo $row['f_name']; ?></td>
                    <td><?php echo $row['f_quantity']; ?></td>
                    <td><?php echo $row['f_expiry']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                        <form action="update_location.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['f_id']; ?>">
                                <input class="location" type="text" name="location" value="<?php echo $row['location']; ?>">
                                <button class="send" type="submit">Send Location</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <hr>
    <br>

    </div>
        <div class="book-donation">

    <h1 class="label">New Book Donations</h1>
    <table>
        <thead>
            <tr>
                <th>Book ID</th>
                <th>Donor ID</th>
                <th>Book Description</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Location</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_books)) : ?>
                <tr>
                    <td><?php echo $row['b_id']; ?></td>
                    <td><?php echo $row['u_id']; ?></td>
                    <td><?php echo $row['b_title']; ?></td>
                    <td><?php echo $row['b_quantity']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    
                    <td>
                        <form action="update_location.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['b_id']; ?>">
                                <input class="location" type="text" name="location" value="<?php echo $row['location']; ?>">
                                <button class="send" type="submit">Send Location</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <hr>
    <br>

    </div>
        <div class="clothes-donation">
    <h1 class="label">New Clothes Donations</h1>
    <table>
        <thead>
            <tr>
                <th>Clothes ID</th>
                <th>Donor ID</th>
                <th>Clothes Type</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Location</th>
                
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result_clothes)) : ?>
                <tr>
                    <td><?php echo $row['c_id']; ?></td>
                    <td><?php echo $row['u_id']; ?></td>
                    <td><?php echo $row['c_type']; ?></td>
                    <td><?php echo $row['c_quantity']; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    
                    <td>
                        <form action="update_location.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['c_id']; ?>">
                                <input class="location"type="text" name="location" value="<?php echo $row['location']; ?>">
                                <button class="send" type="submit">Send Location</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <br>
    <hr>
    <br>
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
    <script>
        let subMenu=document.getElementById("subMenu");
        function toggleMenu(){
            subMenu.classList.toggle("open-menu");
        }
    </script>
</body>
</html>