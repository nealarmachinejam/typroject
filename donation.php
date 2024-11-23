<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['valid'])){
        header("Location:admin_login.php");
    }

    // Retrieve food donations
$sql_food = "SELECT * FROM food";
$result_food = mysqli_query($con, $sql_food);

// Retrieve book donations
$sql_books = "SELECT * FROM book";
$result_books = mysqli_query($con, $sql_books);

// Retrieve clothes donations
$sql_clothes = "SELECT * FROM clothes";
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

    <title>admin donation</title>

    <style>
      
      <?php include "css/hf.css";    
            include "css/sideprofile.css";
       ?>
.donation-label{
    background-color: #dcd8d8;
    padding: 20px 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px 20px 20px 20px;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

th {
    background-color: #b32222;
    color: #fff;
    padding: 10px;
    text-align: left;
}

tr:nth-child(even) {
    background-color: #f2f2f2; /* Light gray background for even rows */
}

td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background-color: #ddd; /* Darker gray background on hover */
}
.label{
    text-align: center;
    margin-bottom: 20px;
    display: block;
    font-size: 1.5em;
    margin-block-start: 0.83em;
    margin-block-end: 0.83em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}
        
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
            <a href="admin_home.php"><img src="img/logo.png" class="logo"></a>
            
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
    <div class="donation-label">
        <div class="food-donation">
            <h2 class="label">Food Donations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>User ID</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
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
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
                <hr>
                <br>
        </div>
        <div class="book-donation">
            <h2 class="label">Book Donations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>User ID</th>
                        <th>Book Title</th>
                        <th>Quantity</th>
                        <th>Status</th>
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
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <br>
                <hr>
                <br>
        </div>
        <div class="clothes-donation">
            <h2 class="label">Clothes Donations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Donation ID</th>
                        <th>User ID</th>
                        <th>Clothes Type</th>
                        <th>Quantity</th>
                        <th>Status</th>
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
    
</body>
</html>