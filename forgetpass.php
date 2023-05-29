<?php

if(isset($_POST['reset']))

{
	$email= $_POST["email"];

	//connect with database
	$con= mysqli_connect("localhost","root","","mr.kottu");

	//email ok and verify
	$sql= "SELECT * FROM customer where E_mail='".$email."'";
	$result= mysqli_query($con,$sql);
  

	if (mysqli_num_rows($result)==0)
	{
  
        echo ("<script> alert ('Email Not Found');</script>");
	}
    else
    {
        header("Location:otp.php");
    }


	
}
?>

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';


require 'vendor/autoload.php';


if(isset($_POST["reset"]))
{
   
    $otp_verification = $_POST['otp'];

    $sql = "SELECT * FROM customer WHERE E_mail='".$email."'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $cname = $row['Name'];

	$mail= new PHPMailer(true);

	try{

		//$mail->SMTPDebug =0;

		$mail->isSMTP();

		$mail->Host = 'smtp.gmail.com';

		$mail->SMTPAuth = true;

		$mail->Username ='finalprojectgp2022@gmail.com';

		$mail->Password ='sgcytospmxkuqzhk';

		$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

		$mail->Port = 587;

		$mail->setFrom('finalprojectgp2022@gmail.com','MR.Kottu');

		$mail->addAddress($email);

		$mail->isHTML(true);

		$verification_code = substr(number_format(time()*rand(),0,'',''),0,6);

		$mail->Subject ='OTP Verification';

		$html = '<html><head></head><body><div style="background-image: linear-gradient(45deg, #29323c, #485563); border-radius: 15px; padding: 15px;"><h1 style="color:white; font-family: poppins; text-align:center;"> Hi '.$cname.' Your OTP Is </h1> <h2 style="color:white; text-align:center;"> '.$verification_code.'</h2>';
		$html .= '</div> </body></html>';

        $mail->Body    =$html;

		$mail->send();

		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);


		$conn= mysqli_connect("localhost","root","","mr.kottu");

        //email verify
        $sql="UPDATE customer SET otp_verification = '$verification_code',otp_at =NOW() WHERE Customer_ID=Customer_ID";


		mysqli_query($conn,$sql);

		header("Location: otp.php");

		echo "OTP is Sented On Your Mail";
		exit();
	}catch(Exception $e) {
		echo "OTP Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
	}
    exit();
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

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
</head>
<body style="background-image: url(assets/img/top-view-circular-food-frame.jpg);
              background-attachment: fixed; background-color: rgba(189, 145, 58, 0.5);">
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-form">
                    <form id="booking-form" method="post" enctype="multipart/form-data">
                        <h2>Reset Password </h2>
                         <input type="hidden" name="otp">
                      <div class="form-group form-input">
                            <input type="email" name="email" value="" required />
                            <label for="phone" class="form-label">Your Email</label>
                            <input type="hidden" name="otp">
                        </div>
                     <div class="form-submit">
                            
                            <center>
                            <input type="submit" value="Submit" class="submit" name="reset">
                        
                        </center>                      
                        </div>           
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