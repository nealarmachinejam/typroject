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
    $sql = "UPDATE food SET status='Rejected' WHERE f_id=$donation_id";
    mysqli_query($con, $sql);

    // Insert a message into the food donation table
    $message = "THANK YOU for your donation,But right now, we don't need it";
    $sql_message = "UPDATE food SET message='$message' WHERE f_id=$donation_id";
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