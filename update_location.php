<?php
session_start();
// Include database configuration file
include("php/config.php");

// Check if user is logged in
if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit; // Terminate script after redirection
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if ID and location are set
    if (isset($_POST['id']) && isset($_POST['location'])) {
        // Sanitize inputs
        $donation_id = mysqli_real_escape_string($con, $_POST['id']);
        $new_location = mysqli_real_escape_string($con, $_POST['location']);

        // Update location in the database
        $sql = "UPDATE food SET location='$new_location' WHERE f_id='$donation_id'";
        if (mysqli_query($con, $sql)) {
            // Location updated successfully
            header("Location: previous_donation.php");
            exit();
        } else {
            // Error updating location
            echo "Error updating location: " . mysqli_error($con);
        }
    } else {
        // ID and location must be set
        echo "ID and location must be set.";
    }
} else {
    // Redirect back to previous page if form is not submitted
    header("Location: previous_donation.php");
    exit();
}
?>
