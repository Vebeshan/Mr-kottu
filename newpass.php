<?php

include('connection.php');

    if(isset($_POST['change']))
    {
    $newpass = $_POST['newpass'];
    $conpass = $_POST['conpass'];


    if($newpass != $conpass)
    {
        $error_msg[]="Password Doesn't Matched";
    }    
    else
    {
        $sql = mysqli_query($con, "UPDATE customer SET Password='$newpass' WHERE Customer_ID=Customer_ID");
        
        if($sql)
        {
            $success_msg[]="Your Password Change";

            header("Location:Customer_Login.php");
        }
    }
    }

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgetpassword Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

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
                            <input type="password" name="newpass" value="" required maxlength="15" minlength="8"/>
                            <label for="phone" class="form-label">New Password</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="password" name="conpass" value="" required maxlength="15" minlength="8"/>
                            <label for="phone" class="form-label">Conform Password</label>
                        </div>
    
                        <div class="form-submit">
                            <center>
                            <input type="submit" value="Change" class="submit" name="change">
                        </center>
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets_for_home/js/Register.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>



<?php include 'alert.php'; ?>
</body>
</html>