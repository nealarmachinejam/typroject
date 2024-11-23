<?php
    session_start();
// Establish a connection to your MySQL database
 $con = mysqli_connect("localhost", "root", "", "project");

// Check the connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
$id=$_SESSION['u_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['form_type'])) {
        // Validate form data
        if ($_POST['form_type'] == 'food') {
            if (!empty($_POST['f_name']) && !empty($_POST['f_quantity']) && !empty($_POST['f_expiry'])) {
                // Process food donation form data
                $f_name = $_POST['f_name'];
                $f_quantity = $_POST['f_quantity'];
                $f_expiry = $_POST['f_expiry'];

                // Insert food donation into database
                $sql = "INSERT INTO food (f_name, f_quantity, f_expiry,u_id) 
                        VALUES ('$f_name', '$f_quantity', '$f_expiry','$id')";
            } else {
                echo "Food donation form fields cannot be empty";
                exit(); // Terminate script execution
            }
        } elseif ($_POST['form_type'] == 'book') {
            if (!empty($_POST['b_title']) && !empty($_POST['b_quantity'])) {
                // Process book donation form data
                $b_title = $_POST['b_title'];
                $b_quantity = $_POST['b_quantity'];

                // Insert book donation into database
                $sql = "INSERT INTO book (b_title, b_quantity,u_id) 
                        VALUES ('$b_title', '$b_quantity','$id')";
            } else {
                echo "Book donation form fields cannot be empty";
                exit(); // Terminate script execution
            }
        } elseif ($_POST['form_type'] == 'clothes') {
            if (!empty($_POST['c_type']) && !empty($_POST['c_quantity'])) {
                // Process clothes donation form data
                $c_type = $_POST['c_type'];
                $c_quantity = $_POST['c_quantity'];

                // Insert clothes donation into database
                $sql = "INSERT INTO clothes (c_type, c_quantity,u_id) 
                        VALUES ('$c_type', '$c_quantity','$id')";
            } else {
                echo "Clothes donation form fields cannot be empty";
                exit(); // Terminate script execution
            }
        }

        // Execute the SQL query
        if (mysqli_query($con, $sql)) {
            echo "Donation added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    } else {
        echo "Form type not specified";
    }
}

// Close MySQL connection
mysqli_close($con);
?>


