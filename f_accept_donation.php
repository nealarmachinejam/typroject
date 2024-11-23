<?php
session_start();
include("php/config.php");


require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $vol_id=$_SESSION['id'];
    $sqlv="SELECT * FROM volunteers WHERE Id='$vol_id'";
    $resultv = mysqli_query($con, $sqlv);
    $rowv = mysqli_fetch_array($resultv);
    $vol_contact=$rowv['contact'];
    $vol_name=$rowv['Username'];


    $id = $_SESSION['u_id'];
    $sql2="SELECT * FROM users WHERE u_id='$id'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $u_email= $row2['u_email'];

    $mail= new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->Username= "maurayaak@gmail.com";
    $mail->Password= "ntljsyiouzxpyhlt";
    $mail->setFrom("maurayaak@gmail.com","ASHA");
    $mail->addAddress($u_email);
    $mail->Subject = "Donation Accepted";
    $mail->Body = "Hello Donor,
    Our Volunteer has accepted your donation request.
    He/She will reach you soon to pick up your donation.
    Here is the Contact Detailes of the Volunteer:
    Name:-".$vol_name." 
    Contact:- ".$vol_contact."
    You can communicate with Volunteer in case of any further Queries.
    Regards,
    TEAM ASHA";
    $mail->send();


if (!isset($_SESSION['valid'])) {
    header("Location: login.php");
    exit;
}

if (isset($_GET['id'])) {
    $donation_id = $_GET['id'];



    // Update food donation status to 'accepted' in the database
    $sql = "UPDATE food SET status='Accepted' WHERE f_id=$donation_id";
    mysqli_query($con, $sql);

    // Insert a message into the food donation table
    $message = "check your Email for further Processing!";
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