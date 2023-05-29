<?php

include 'connection.php';

session_start();

if(isset($_POST['login'])){

   $email =$_POST['username'];
   $pass = $_POST['userpassword'];

   $select = " SELECT * FROM admin WHERE Email  = '$email' && Password = '$pass' ";

   $result = mysqli_query($con, $select);

   if(mysqli_num_rows($result) > 0){
       
     $row = mysqli_fetch_array($result);

       
         if($row['Type']=='Super Admin'){

         $_SESSION['admin_id']= $row['ID'];
         $_SESSION['admin_name']= $row['Name'];
         $_SESSION['admin_Email']= $row['Email'];
         $_SESSION['admin_Type']= $row['Type'];
         $_SESSION['admin_image']= $row['image'];


         header('location:Admin_Dashboard.php');    
         }
       elseif($row['Type']=='Admin')
       {
           $_SESSION['user_name']= $row['Name'];
           $_SESSION['user_id']= $row['ID'];
           $_SESSION['user_Email']= $row['Email'];
           $_SESSION['user_Type']= $row['Type'];
           $_SESSION['user_image']= $row['image'];
          header('location:User_dashboard.php');    
       }
     else{
      echo "<script> alert('incorrect email or password'); </script>";
      }
}
    else{
      echo "<script> alert('incorrect email or password'); </script>";
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
  <title>Admin Login</title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/Mr.K logo.JPG" type="image/x-icon">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>

  <link href="button.css" rel="stylesheet"/>
    
</head>

<body class="bg-theme bg-theme1">

<!-- start loader -->
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   <!-- end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
 <br> <br> <br> <br> <br> <br>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2">
		 	<div class="text-center">
		 		<img src="assets/images/Mr.K logo.JPG" alt="logo icon"  style=" height: 10rem;
                           width: 10rem;
                           border-radius: 50%;                                                    
                           object-fit: cover;
                           margin-bottom: .5rem;">
		 	</div>
		  <div class="card-title text-uppercase text-center py-3">Sign In</div>
		    <form method="POST">
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">E-mail</label>
			   <div class="position-relative has-icon-right">
				  <input type="email" class="form-control input-shadow" placeholder="Enter E-mail" name="username" required="required">
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" class="form-control input-shadow" placeholder="Enter Password" name="userpassword" required="required" maxlength="15"
                minlength="8">
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			<div class="form-row">
			 
			 <div class="form-group col-12 text-center"><a href="reset-password.php">
			 Reset Password</a>
			 </div>
			</div>
			 <input type="submit" class="btn btn-light btn-block" value="Sign In" name="login">
			  </form>
			 
			
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