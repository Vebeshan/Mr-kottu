<?php

include 'connection.php';

session_start();

$user_name=$_SESSION['user_name'];
$res=mysqli_query($con,"SELECT * FROM admin WHERE Name='$user_name' ");
$row=mysqli_fetch_assoc($res);


if(!isset($user_name)){
   header('location:login_form.php');
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
  <title> Admin Dashboard </title>
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
  <!--favicon-->
  <link rel="icon" href="assets/images/Mr.K logo.JPG" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
   

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
</head>

<body class="bg-theme bg-theme2">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="User_dashboard.php">
       <img src="assets/images/Mr.K logo.JPG" class="logo-icon" alt="logo icon">
       <h5 class="logo-text">Mr Kottu Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol list-unstyled">
      <li class="sidebar-header"><h4 class="text-center">Hi Welcome Back <?php echo $user_name ?> !</h4></li>
      <li>
        <a href="User_dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="User_profile.php">
          <i class="icon-user"></i> <span>Profile</span>
        </a>
      </li>
      <li>
        <a href="customer.php">
          <i class="icon-people"></i> <span>Customers</span>
        </a>
      </li>

      <li>
        <a href="view_orders.php">
          <i class="zmdi zmdi-card"></i> <span>Orders</span>
        </a>
      </li>

      <li>
        <a href="showproducts_Copy.php">
          <i class="icon-plus"></i> <span>Foods</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>
       
       <li>
        <a href="Galary.php">
          <i class="icon-plus"></i> <span>Galary</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

      <li>
        <a href="Reports.php">
          <i class="zmdi zmdi-face"></i> <span>Reports</span>
        </a>
      </li>

      <li>
        <a href="Messages.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Messages</span>
        </a>
      </li>
       
       
    </ul>
   
   </div>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="profile.php">
        <span class="user-profile"><img src="updated_photo/<?php echo $row['image']; ?>" class="img-circle" alt="Admin user"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><a href="User_profile.php"><img class="align-self-start mr-3" src="updated_photo/<?php echo $row['image']; ?>" alt="user avatar"></a></div>
            <div class="media-body">
            <a href="User_profile.php"><h6 class="mt-2 user-title"><?php echo $row['Name']; ?></h6></a>
            <a href="User_profile.php"><p class="user-subtitle"><?php echo $row['Email']; ?></p></a>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <a href=""><li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="User_profile.php"><li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href=""><li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="logout_funtion.php"><li class="dropdown-item"><i class="icon-power mr-2"></i> Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container-fluid">

  <!--Start Dashboard Content-->

       <div class="container align-items-center justify-content-center shadow-sm">
      <div class="row">
         <div class="col-12">
         <div class="card">
            <div class="card-body">
              <div class="card-title text-center"><h3>Add Galary</h3></div>
               <form method="post" action="galaryupload.php">
                <label>Food Name</label>
               <input type="text" name="pname" class="form-control" placeholder="Enter Food Name" required="required"><br>
               <input type="file" name="[]" multiple class="form-control" >
                   <br>
                <input type="submit" name="add" value="ADD" class="btn btn-primary text-center" required="required">
                </form>

      <!--End Dashboard Content-->
	  
	<!--start overlay-->
		  <div class="overlay toggle-menu"></div>
		<!--end overlay-->
		
    </div>
    <!-- End container-fluid-->
    
    </div><!--End content-wrapper-->
   <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2022 Mr kottu
        </div>
      </div>
    </footer>
	<!--End footer-->
	
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
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <script src="assets/js/jquery.loading-indicator.js"></script>
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
  <!-- Index js -->
  <script src="assets/js/index.js"></script>
</body>
</html>

