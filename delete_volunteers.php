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

// Check if user ID parameter is set in the URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Get user ID from the URL parameter
    $user_id = $_GET['id'];

    // SQL query to delete user from the database
    $sql = "DELETE FROM volunteers WHERE Id = $user_id";

    if ($con->query($sql) === TRUE) {
        // User deleted successfully
        header("Location: admin_home.php");
        exit();
    } else {
        // Error handling
        echo "Error: " . $sql . "<br>" . $con->error;
    }
} else {
    // If user ID parameter is not set or empty, redirect to admin page
    header("Location: admin_home.php");
    exit();
}

// Close database connection
$con->close();
?>