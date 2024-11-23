<?php
// Include database configuration file
include("php/config.php");
session_start();





    require "PHPMailer-master/src/PHPMailer.php";
    require "PHPMailer-master/src/SMTP.php";
    require 'PHPMailer-master/src/Exception.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;



    $_SESSION['message_id']=$_POST['message_id'];
    $id=$_POST['message_id'];
    $sql2="SELECT * FROM messages WHERE message_id='$id'";
    $result2 = mysqli_query($con, $sql2);
    $row2 = mysqli_fetch_array($result2);
    $u_email= $row2['email'];
    $a_reply= $row2['reply'];

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
    $mail->Subject = "your message reply";
    $mail->Body = "Hello user, ".$a_reply."
    

    Regards,
    TEAM ASHA";
    $mail->send();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the message ID and reply from the form
    $message_id = $_POST['message_id'];
    $reply = $_POST['reply'];

    // Prepare and execute SQL query to update the message with the reply
    $sql = "UPDATE messages SET reply = ? , status= 'sent' WHERE message_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("si", $reply, $message_id);
    $stmt->execute();

    // Check if the query was successful
    if ($stmt->affected_rows > 0) {
        // Close statement
        $stmt->close();
        
        // Close connection
        $con->close();
        
        // Alert the user that the reply was stored successfully
        echo "<script>alert('Reply sent successfully');</script>";
        header("Location:messages.php");
        
        // Redirect back to message.php
        // echo "<script>window.location.href = 'message.php';</script>";
        exit();
    } else {
        echo "Error storing reply: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
}

// Close connection
$con->close();
?>