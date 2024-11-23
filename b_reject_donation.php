<?php
session_start();
include("php/config.php");

if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $donation_id = $_GET['id'];

    // Update food donation status to 'accepted' in the database
    $sql = "UPDATE book SET status='Rejected' WHERE b_id=$donation_id";
    mysqli_query($con, $sql);

    // Insert a message into the food donation table
    $message = "THANK YOU for your donation, But we do not need it right now.";
    $sql_message = "UPDATE book SET message='$message' WHERE b_id=$donation_id";
    mysqli_query($con, $sql_message);

    // Redirect back to the page where the food donations are listed
    header("Location:new_donation.php");
    exit;
} 
 else {
    // If donation ID is not provided, redirect to an error page or handle it accordingly
    header("Location: error.php");
    exit;
}
?>