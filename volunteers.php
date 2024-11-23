<?php
// Include database configuration file
include("php/config.php");

// Check if user is logged in
session_start();
if (!isset($_SESSION['a_id'])) {
    // Redirect to login page or display an error message
    header("Location: admin_login.php");
    exit();
}

// Query to fetch registered users from the database
$sql = "SELECT * FROM volunteers";
$resultv = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donors</title>
<!-- <link rel="stylesheet" href="styles.css"> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
 <!-- footer icon link -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<style>
        
      <?php 
      
      include "css/donor.css";
      include "css/hf.css";
      include "css/sideprofile.css"; ?>
      

    </style>
</head>
<body>
<?php
$id=$_SESSION['a_id'];
$query=mysqli_query($con,"SELECT * FROM admin WHERE a_id=$id");

while($result=mysqli_fetch_assoc($query)){
    $res_Uname=$result['a_name'];
    $res_Email=$result['a_email'];
    $res_Address=$result['a_address'];
    $res_id=$result['a_id'];
}
?>
<header class="header">
        <nav>
            <a href="index.php"><img src="img/logo.png" class="logo"></a>
            
                <ul>
                    <li><a href="admin_home.php">Home</a></li>
                    <li><a href="volunteers.php">Volunteers</a></li>
                    <li><a href="donors.php">Donors</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="donation.php">Donation</a></li>
                    <li><a href="admin_side_cf.php">Add Crowdfunding</a></li>
                    
                </ul>
        </nav>
    </header>

<div class="admin-container">
  <h2>Registered Volunteers</h2>
  <div class="users-list">
    <table>
      <tr>
        <th>Volunteer ID</th>
        <th>Volunteer Name</th>
        <th>Email</th>
        <th>Address</th>
        <th>Password</th>
        <th>Contact</th>
        <th>Action</th>
      </tr>
      <?php
      // Display registered users
      if ($resultv->num_rows > 0) {
          while($row = $resultv->fetch_assoc()) {
              echo "<tr>";
              echo "<td>" . $row["Id"] . "</td>";
              echo "<td>" . $row["Username"] . "</td>";
              echo "<td>" . $row["Email"] . "</td>";
              echo "<td>" . $row["Address"] . "</td>";
              echo "<td>" . $row["Password"] . "</td>";
              echo "<td>" . $row["contact"] . "</td>";
              echo "<td><a href='delete_volunteers.php?id=" . $row["Id"] . "'>Delete</a></td>";
              echo "</tr>";
          }
      } else {
          echo "<tr><td colspan='7'>No newly registered users</td></tr>";
      }
      ?>
    </table>
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