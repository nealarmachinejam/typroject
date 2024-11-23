<?php
session_start();

// Check if admin is logged in
if(!isset($_SESSION['a_id'])) {
    header("Location: admin_login.php");
    exit();
}

// Include database connection and configuration
include("php/config.php");

// Handle form submission for creating crowdfunding form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = mysqli_real_escape_string($con, $_POST['form_title']);
    $description = mysqli_real_escape_string($con, $_POST['form_description']);
    $goal_amount = mysqli_real_escape_string($con, $_POST['goal_amount']);

    // Insert crowdfunding form data into the database
    $sql = "INSERT INTO crowdfunding_forms (form_title, form_description, goal_amount) VALUES ('$title', '$description', '$goal_amount')";
    if(mysqli_query($con, $sql)) {
        // Redirect to admin dashboard with success message
        header("Location: admin_side_cf.php?success=true");
        exit();
    } else {
        // Error handling
        $error = "Error: " . mysqli_error($con);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- header and footer css sheet -->
    <link rel="stylesheet" href="css/style.css">
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"/>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- bootstrap link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- footer icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Admin</title>
    <style>
        
      <?php include "css/hf.css";
      ?>
      .cf{
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
            font-family: 'poppins','sans-serif';
            
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            background-color: #b32222;
            border-radius: 5px;
            color: white;
            padding: 10px;
            
    
            display: block;
            font-size: 1.3em;
            margin-block-start: 0.83em;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            font-weight: bold;
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
            background-color: #b32222;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
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
                    <li><a href="admin_home.php">Home</a></li>
                    <li><a href="volunteers.php">Volunteers</a></li>
                    <li><a href="donors.php">Donors</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="donation.php">Donation</a></li>
                    <li><a href="admin_side_cf.php">Add Crowdfunding</a></li>
                    
                </ul>
        </nav>
    </header>
    
    <div class="cf">
        <!-- Crowdfunding Form Creation -->
        <h2>Create Crowdfunding Form</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="title">Title:</label><br>
            <input type="text" id="form_title" name="form_title" required><br>
            <label for="description">Description:</label><br>
            <textarea id="form_description" name="form_description" required></textarea><br>
            <label for="goal_amount">Goal Amount:</label><br>
            <input type="number" id="goal_amount" name="goal_amount" required><br>
            <button type="submit">Create Form</button>
        </form>
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