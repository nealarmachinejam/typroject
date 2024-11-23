<?php
// Include database connection and configuration
include("php/config.php");
// if(!isset($_SESSION['u_id'])) {
//     header("Location: u_login.php");
//     exit();
// }

// Retrieve crowdfunding form data from the database
$sql = "SELECT * FROM crowdfunding_forms";
$result = mysqli_query($con, $sql);

// Check for query errors
if (!$result) {
    $error = "Error: " . mysqli_error($con);
} else {
    // Fetch form data and display crowdfunding forms
    $crowdfunding_forms = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>donor page</title>
   

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
    <title>donor page</title> 
   
    <style>
        
        <?php include "css/hf.css";
        ?>
        .table-container {
    background-color: #dcd8d8;
    padding: 20px 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin: 20px 20px 20px 20px;

}
         
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 100px;
        }

        button {
            padding: 10px 20px;
            background-color: #e44b41;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #b32222;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }
        
    </style>
</head>
<body>
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
        </nav>
    </header>
    <div class="table-container">
    <h1>Crowdfunding Forms</h1>
    <hr>
    <hr>

    <!-- Display Crowdfunding Forms -->
    <?php if (isset($crowdfunding_forms) && count($crowdfunding_forms) > 0): ?>
        <?php foreach ($crowdfunding_forms as $form): ?>
            <div>
                <h2><?php echo $form['form_title']; ?></h2>
                <p><?php echo $form['form_description']; ?></p>
                <p>Goal Amount: $<?php echo $form['goal_amount']; ?></p>
                <!-- Add donation form here -->
                <form method="post" action="money_process_donation.php">
                    <label for="donate_amount">Donate Amount:</label><br>
                    <input type="number" id="donate_amount" name="donate_amount" required><br>
                    <input type="hidden" name="forms_id" value="<?php echo $form['form_id']; ?>">
                    <button type="submit">Donate</button>
                </form>
                <hr>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="error">No crowdfunding forms available.</p>
    <?php endif; ?>
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