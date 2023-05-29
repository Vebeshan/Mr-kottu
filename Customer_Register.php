<?php

include("connection.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';


require 'vendor/autoload.php';


if(isset($_POST["Register"]))
{
	$name=$_POST["name"];
    $address=$_POST["address"];
    $area=$_POST["area"];
    $contact = $_POST["phone"];
	$email=$_POST["email"];
	$password=$_POST["password"];
    $conformpass=$_POST["conformpass"];
    
    $uimage=$_FILES['customer_img']['name'];
    $uimage_tmp_name = $_FILES['customer_img']['tmp_name'];
    $uimage_folder = 'updated_photo/'.$uimage;
    
    $customer_address[] = $address . ',' . $area;
    $fulladdress = implode(', ',$customer_address);


    $select = mysqli_query($con, "SELECT * FROM customer WHERE E_mail='$email'");
    $number = mysqli_query($con, "SELECT * FROM customer WHERE Tel_no='$contact'");

    if (mysqli_num_rows($select) > 0) {
        $warning_msg[]="This Mail Already Exist...";

        
    }
    else if (mysqli_num_rows($number) > 0)
         {
            $warning_msg[]="This Phone Mobile Number Already Exist...";
        }
    else if($password != $conformpass)
    {
         $warning_msg[]="Entered Password Doesn't Match...";
    }
    
    
    else 
    {

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

		$mail->Subject ='Email Verification';

		$html = '<html><head></head><body><div style="background-image: linear-gradient(45deg, #29323c, #485563); border-radius: 15px; padding: 15px;"><h1 style="color:white; font-family: poppins; text-align:center;"> Your Verification Code Is </h1> <h2 style="color:white; text-align:center;"> '.$verification_code.'</h2>';
		$html .= '</div> </body></html>';

        $mail->Body    =$html;

		$mail->send();

		$encrypted_password = password_hash($password, PASSWORD_DEFAULT);


        include("connection.php");

		$sql="INSERT INTO customer(Name, Address, Tel_no, E_mail,Password,photo, verification_code,verification_at) values('".$name."','".$fulladdress."','".$contact."','".$email."','".$password."','". $uimage."','".$verification_code."',NOW())";

		mysqli_query($con,$sql);

		header("Location: email-verification.php");


        $success_msg[]="Email is Sented On Your Mail";
        
		exit();
	}catch(Exception $e) {
		echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
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
    <title>Sign Up Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="assets_for_home/fonts/material-icon/css/material-design-iconic-font.min.css">

    <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body style="background-color: rgba(189, 145, 58, 0.5);">
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-form">
                    <form id="booking-form" method="post" enctype="multipart/form-data">
                        <h2>Account Registeration</h2>
                        <div class="form-group form-input">
                            <input type="text" name="name" value="" required/>
                            <label for="name" class="form-label">Your name</label>
                        </div>
                        <div class="form-group form-input">
                            <label for="name" style="color:#ffc56e;">Your Address</label>
                            <input type="text" name="address" placeholder="Ex: No #, Street Name only" required/>
                            <select name="area">
                                <option value="Batticaloa">Batticaloa</option>
                            </select>
                            
                            
                            
                        </div>
                        <div class="form-group form-input">
                            <input type="number" name="phone" value="" required />
                            <label for="phone" class="form-label">Your phone number</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="email" name="email" value="" required />
                            <label for="phone" class="form-label">Your Email</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="password" value="" required maxlength="15"
                minlength="8"/>
                            <label for="phone" class="form-label">Enter Password</label>
                        </div>
                        <div class="form-group form-input">
                            <input type="password" name="conformpass" value="" required maxlength="15"
                minlength="8"/>
                            <label for="phone" class="form-label">Re-Enter Password</label>
                        </div>
                        
                        <div class="form-group form-input">
                            <input type="file" name="customer_img" value="" required />
                            
                        </div>

                        <div class="form-submit">
                            <p>Do You Already Have Account?<a href="Customer_Login.php" > Login Now...</a></p>
                            <br>
                            <center>
                            <input type="submit" value="Register" class="submit" name="Register">
                        </center>
                            <p>You Will Get Message From Your E-mail After Registration</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="assets_for_home/js/Register.js"></script>
    <script>
  const disabledKeys = ["c", "C", "x", "J", "u", "I"]; // keys that will be disabled

  const showAlert = e => {
    e.preventDefault(); // preventing its default behaviour
    return alert("Sorry, you can't view or copy source codes this way!");
  }

  document.addEventListener("contextmenu", e => {
    showAlert(e); // calling showAlert() function on mouse right click
  });

  document.addEventListener("keydown", e => {
    // calling showAlert() function, if the pressed key matched to disabled keys
    if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
      showAlert(e);
    }
  });
</script>
    <?php include 'alert.php'; ?>
</body>
</html>

