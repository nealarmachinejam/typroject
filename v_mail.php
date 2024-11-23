<?php

session_start();
include("php/config.php");


require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    $id = $_SESSION['id'];
    $sql2="SELECT * FROM volunteers WHERE Id='$id'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $u_email= $row2['Email'];

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
    $mail->Subject = "Donation Payment Received";
    $mail->Body = "Hello Donor,
    Thank You for your Donation!

    Regards,
    TEAM ASHA";
    $mail->send();

$sql="UPDATE money_donation SET pay_status='SUCCESSFULL' WHERE user_id='$id'";
$result = mysqli_query($con, $sql);
header("Location:v_user_side_cf.php");

?>