<?php
session_start();

// Include database connection and configuration
include("php/config.php");

// Check if the user is logged in
if (!isset($_SESSION['u_id'])) {
    header("Location: u_login.php");
    exit();
}

// Handle donation submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve donation data
    $donate_amount = mysqli_real_escape_string($con, $_POST['donate_amount']);
    $form_id = mysqli_real_escape_string($con, $_POST['forms_id']);
    $user_id = $_SESSION['u_id']; // Assuming user ID is stored in session

    // Insert donation data into the database
    $sql = "INSERT INTO money_donation (user_id, forms_id, donate_amount) VALUES ('$user_id', '$form_id', '$donate_amount')";
    if (mysqli_query($con, $sql)) {
        // Donation successful, redirect to user page with success message
        $apikey="rzp_test_XdyWGN1pgsXHh5";
        $amount=$_POST['donate_amount'];
        $amount2=$amount*100;
?>

<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

<form action="mail.php" method="post">
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey;?>"
    data-amount="<?php echo $amount2;?>"
    data-currency="INR"
    data-id="1001"
    data-buttontext="Pay With Razorpay"
    data-name="ASHA"
    data-description="Ornaments purchase and sell"
    data-image=""
    data-prefill.name="Ajaykumar Maurya"
    data-prefill.email="krishjain1903@gmail.com"
    data-prefill.contact="9987313390"
    data-theme.color="#0e90e4">
</script>
<style>
    .razorpay-payment-button {
        margin-top: 300px;
        margin-left: 600px;
        height:80px;
        width:300px;
        background-color: #e44b41;
        padding-top: 20px;
        padding-bottom: 20px;
        padding-left: 20px;
        padding-right: 20px;
        border-radius: 5px;
        color: white;
        font-weight: bold;
        font-size: 1.5em;
    

    }
    .razorpay-payment-button:hover{
        background-color: #b32222;
    }
</style>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
<?php
        exit();
    } else {
        // Error occurred while processing donation
        $error = "Error: " . mysqli_error($con);
    }
}

// Redirect to user page if donation submission method is incorrect
exit();
?>