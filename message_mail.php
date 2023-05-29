 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
      
<link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'includes/Exception.php';
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';


	require 'vendor/autoload.php';
        include("connection.php");

        if(isset($_POST['sendmessage']))
        {
            $mname = $_POST['name'];
            $memail  = $_POST['email'];
            $msubject  = $_POST['subject'];
            $mmessage  = $_POST['message'];

            $sql = mysqli_query($con, "INSERT INTO message(Name,Email,subject,message,status) VALUES('$mname',' $memail','$msubject','$mmessage','0')");
            
            if($sql)
            {
                echo "<script> alert('Your Message Successfully Sent'); location.replace('index.php'); </script>";	
				
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
			
					$mail->setFrom('finalprojectgp2022@gmail.com');
			
					$mail->addAddress('finalprojectgp2022@gmail.com');
			
					$mail->isHTML(true);
			
					$verification_code = substr(number_format(time()*rand(),0,'',''),0,6);
			
					$mail->Subject = 'Feedback From Customer';
					$sql =  "SELECT * FROM message ORDER BY id desc LIMIT 1";
					$res=mysqli_query($con,$sql);
					$row = mysqli_fetch_array($res);
					$id = $row['ID'];
					$html = '<html><head></head><body><div style="background-image: linear-gradient(45deg, #29323c, #485563); color: black; font-family: poppins; text-align:center;width:80%; border-radius: 10px; padding-bottom: 50px;"><h1 style="background:#393836;color:white; border-radius: 5px; padding: 5px;"> Reply For Customer </h1>';
					$html .= '<h2 style="color:white; ">Name : '.$mname.'</h2>';
					$html .= '<h2 style="color:white; text-decoration: none; ">From : '.$memail."".'</h2>';
					$html .= '<h2 style="color:white; ">Subject : '.$msubject.'</h2>';
					$html .= '<h2 style="color:white; ">Message : '.$mmessage.'</h2>';
					$html .= "<a href='http://localhost/mr/reply.php?uid=$id' style='color:white;background:black;border-radius:5px; text-decoration:none; padding: 5px; size:15px; font-size: 20px;'>Replay </a>";
					$html .= '</div> </body>';
			
					$mail->Body    =$html;
			
					$mail->send();
			
					$conn= mysqli_connect("localhost","root","","mr.kottu");
			
					mysqli_query($conn,$sql);
					
				}catch(Exception $e) {
					echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
				}
			
				mysqli_close($con);
				
            }
			else
			{
                $error_msg[]="Message Sent Unsuccessfully";
			}

        }

       
        
?>

<?php
	

	

	$mname = $_POST['name'];
	$memail  = $_POST['email'];
	$msubject  = $_POST['subject'];
	$mmessage  = $_POST['message'];

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

		$mail->setFrom('finalprojectgp2022@gmail.com');

		$mail->addAddress( $_POST['email']);

		$mail->isHTML(true);

		$verification_code = substr(number_format(time()*rand(),0,'',''),0,6);

		$mail->Subject = 'Reply From MR KOTTU';

		$html = '<html><head></head><body><div style="color: black; text-align:center;"><h1 style="background-image: linear-gradient(45deg, #29323c, #485563); color:white; padding: 30px; border-radius: 15px; font-family: poppins;"> Thankyou For Your Feedback 😊 </h1>';
		$html .= '</div> </body>';

		$mail->Body    =$html;

		$mail->send();

		$conn= mysqli_connect("localhost","root","","mr.kottu");

		mysqli_query($conn,$sql);
		exit();
	}catch(Exception $e) {
		echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
	}

	mysqli_close($con);
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'alert.php'; ?>