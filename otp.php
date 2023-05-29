<?php
if(isset($_POST['otpverify']))
{
    $otp=$_POST['otp'];

    //connect With Database
    $con=mysqli_connect("localhost","root","","mr.kottu");

    //otp conform and verify
    $sql="SELECT * FROM customer WHERE otp_verification='".$otp."'";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==0)
    {
        echo("<script> alert('OTP Doesn't Match');</script>");
    }
    else
    {
        header("Location:newpass.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OTP </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="booking-content">
               
                <div class="booking-form">
                    <form id="booking-form" method="post" enctype="multipart/form-data">
                        <h2>Reset Password </h2>
                        
                        <div class="form-group form-input">
                            <input type="text" name="otp" value="" required />
                            <label for="phone" class="form-label">Enter OTP</label>
                        </div>
                            <center>
                            <input type="submit" value="Submit" class="submit" name="otpverify">
                            <p>Your OTP Will Sent Your E-mail Address...</p>
                        </center>
                        </form>
                        </div>
                </div>
            </div>
        </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/Register.js"></script>
</body>
</html>