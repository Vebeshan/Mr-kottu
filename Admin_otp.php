<?php

include("connection.php");
if(isset($_POST['otpverify']))
{
    $otp=$_POST['otp'];

    //connect With Database

    //otp conform and verify
    $sql="SELECT * FROM admin WHERE verification_code='".$otp."'";
    $result=mysqli_query($con,$sql);

    if(mysqli_num_rows($result)==0)
    {
        echo("<script> alert('OTP Doesn't Match');</script>");
    }
    else
    {
        header("Location:changepass.php");
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Reset Password</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <link rel="icon" href="assets/images/Mr.K logo.JPG" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="height-100v d-flex align-items-center justify-content-center">
	<div class="card card-authentication1 mb-0">
		<div class="card-body">
		 <div class="card-content p-2">
		  <div class="card-title text-uppercase pb-2">Reset Password</div>
		    <p class="pb-2">Please enter your OTP.</p>
		    <form method="POST">
			  <div class="form-group">
			  
        
			   <div class="position-relative has-icon-right">
				  <input type="text" id="exampleInputEmailAddress" name="otp" class="form-control input-shadow" placeholder="Enter OTP">
				  <div class="form-control-position">
            <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			 
			  <button type="Submit" name="otpverify" class="btn btn-light btn-block mt-3">Submit</button>
			 </form>
		   </div>
		  </div>
		   <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Return to the <a href="login_form.php"> Sign In</a></p>
		  </div>
	     </div>
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--start color switcher-->
   <div class="right-sidebar">
    <div class="switcher-icon">
      <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
    </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
     </div>
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  
	
</body>
</html>
