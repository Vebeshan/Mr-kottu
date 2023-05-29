<?php

if(isset($_POST["resend"]))
{
	$name=$_POST["name"];
	$email=$_POST["email"];
	$password=$_POST["password"];

	$mail= new PHPMailer(true);

	try{

		//$mail->SMTPDebug =0;

		$mail->isSMTP();

		$mail->Host = 'smtp.gmail.com';

		$mail->SMTPAuth = true;

		$mail->Username ='finalprojectgp2022@gmail.com';

		$mail->Password ='tilxzpnevyubqrnj';

		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

		$mail->Port = 587;

		$mail->setFrom('finalprojectgp2022@gmail.com');

		$mail->addAddress($email);

		$mail->isHTML(true);

		$verification_code = substr(number_format(time()*rand(),0,'',''),0,6);

		$mail->Subject ='Email Verification';

		$mail->Body    ='<p> Your Verification Code is:<b>'.$verification_code .'</b></p>';


		$mail->send();

		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);


		$conn= mysqli_connect("localhost","root","","mr.kottu");

		$sql="INSERT INTO customer(name, email, password, verification_code, verification_at) values('".$name."','".$email."','".$encrypted_password."','".$verification_code."',NOW())";

		mysqli_query($conn,$sql);

		header("Location: resgister.php");

		echo "Email is Sented On Your Mail";
		exit();
	}catch(Exception $e) {
		echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
	}
}


if(isset($_POST["verify_email"]))
{
$newpass=$_POST["newpass"];

//connect with database

	$conn= mysqli_connect("localhost","root","","mr.kottu");

	//email verify
	$sql="UPDATE customer SET verification_at=NOW() where verification_code ='".$newpass."'";

	$result =mysqli_query($conn, $sql);

	if(mysqli_affected_rows($conn) == 0)
	{
		die("verification code failed.");
	}
	header("Location:Customer_Login.php");
	exit();

}?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mail verfication </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="assets/fontawesome/all.min.css">
<script src="assets/fontawesome/all.min.js"></script>

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-form">
                    <form id="booking-form" method="post" enctype="multipart/form-data">
                        <h2>Your Registration Successfully Completed... </h2><br>
                        <p>Now Verify Your Mail Address</p>

                        <div class="form-group form-input">
                            <input type="text" name="newpass" value="" required>
                            <label for="phone" class="form-label">Verfication Code</label>
                        </div>
    
                        <div class="form-submit">
                            <center>
<button type="submit" class="submit" name="verify_email"><i class="fas fa-envelope"></i> Verify Mail</button><br>
<br>
<button type="button" class="submit" name="resend"><i class="fas fa-sync"></i> Resend Code</button>
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
