<?php

include 'connection.php';

session_start();

if(isset($_SESSION['user_id']))
{
  $admin_ID=$_SESSION['user_id'];

  $admin=mysqli_query($con,"SELECT * FROM admin WHERE ID='$admin_ID' ");
  if(mysqli_num_rows($admin)>0)
  {
    $row=mysqli_fetch_assoc($admin);

    $admin_name=$row['Name'];
    $admin_Email=$row['Email'];
    $admin_Type=$row['Type'];
    $admin_image=$row['image'];
  }

$mrk=mysqli_query($con,"SELECT * FROM resturent");
$mrk_fetch=mysqli_fetch_assoc($mrk);

$r_name=$mrk_fetch['resturent_Name'];
$r_logo=$mrk_fetch['photo'];
}

else
{
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
  <title> Admin Dashboard</title>
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
       <img src="updated_photo/<?php echo $mrk_fetch['photo']; ?>" class="logo-icon" alt="logo icon">
       <h5 class="logo-text"><?php echo $r_name; ?> Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol list-unstyled">
      <li class="sidebar-header"><h4 class="text-center">Hi Welcome Back <?php echo $admin_name; ?> !</h4></li>
      <li>
        <a href="User_dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="User_profile.php">
          <i class="icon-user"></i> <span>Admin</span>
        </a>
      </li>
         
      <li>
        <a href="customer_Copy.php">
          <i class="icon-people"></i> <span>Customers</span>
        </a>
      </li>

      <li>
      <a href="user_order_form.php">
      <i class="fas fa-utensils"></i> <span>Orders</span>
      <small class="badge float-right badge-light">New</small>
        </a>
      </li>
       <li>
        <a href="user_menu.php">
        <i class="fas fa-utensils"></i> <span>Menu</span>
        <small class="badge float-right badge-light">New</small>
        </a>
      </li>
      <li>
        <a href="user_product.php">
        <i class="fas fa-utensils"></i> <span>Foods</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>
       
       
       <li>
        <a href="user.galary.php">
        <i class="fas fa-images"></i> <span>Galary</span>
          <small class="badge float-right badge-light">New</small>
        </a>
      </li>

      <li>
        <a href="user_message.php" >
        <i class="fas fa-envelope"></i> <span>Messages</span>
        </a>
      </li>
      <li>
        <a href="user_review.php" >
        <i class="fas fa-reply"></i> <span>Review</span>
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
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i>

        
        </a>
    </li>
    <li class="nav-item dropdown-lg">
        <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="Notification.php">
           <div class="media">
            <?php   
                  $customer_count=mysqli_query($con,"SELECT * from `notifications` where `status` = 'unread' order by `date` DESC");
                   $cucount=mysqli_num_rows( $customer_count);
                   
                  ?>
            <div class="media-body">
            <a href="Notification.php"><h6 class="mt-2 user-title">Notification</h6></a>
           
            </div>
           </div>
          </a>
        </li>
            <?php while($date=mysqli_fetch_assoc($customer_count))
                {
                  $u_name=$date['name'];
                    ?>
    

        <li class="dropdown-divider"></li>
        <a href=""><li class="dropdown-item"><i class="icon-envelope mr-2"></i><?php echo $date['date']; ?>
            <br><?php echo $date['name']; ?> Added New Order<br></a>
        <li class="dropdown-divider"></li>
           
            <?php    } ?>
             <center><a href="Notification.php" class="text-info p-5">View All</a></center>
       
      </ul>
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="http://example.com">
                
        
          <i class="fa fa-bell-o"> <span class="badge badge-light"><?php echo $cucount ?></span></i></a>
    </li>
      
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="Admin_profile.php">
        <span class="user-profile"><img src="updated_photo/<?php echo $admin_image; ?>" class="img-circle" alt="Admin user"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><a href="Admin_profile.php"><img class="align-self-start mr-3" src="updated_photo/<?php echo $admin_image; ?>" alt="user avatar"></a></div>
            <div class="media-body">
            <a href="Admin_profile.php"><h6 class="mt-2 user-title"><?php echo $admin_name; ?></h6></a>
            <a href="Admin_profile.php"><p class="user-subtitle"><?php echo $admin_Email; ?></p></a>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <a href=""><li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="Notification.php"><li class="dropdown-item"> <i class="fa fa-bell-o"> <span class="badge badge-light"><?php echo $cucount ?></span></i> Notification</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="Admin_profile.php"><li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li></a>
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

      <div class="row mt-3">
        <div class="col-lg-4">
           <div class="card profile-card-2">
            <div class="card-img-block">
                <img class="img-fluid" src="updated_photo/<?php echo $mrk_fetch['photo']; ?>" alt="Card image cap">
            </div>
            <div class="card-body pt-5">
                <img src="updated_photo/<?php echo $row['image']; ?>" alt="profile-image" class="profile">
                <h5 class="card-title"><?php echo $row['Name']; ?></h5>
                <p class="card-text">Status : <span class="text-info">Active</span></p>
            </div>
			
			<div class="card-body border-top border-light">
                 <div class="media align-items-center">
               
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
					   <?php
					   
					   $count_admin=mysqli_query($con,"SELECT * FROM admin WHERE Type='Admin' ");
					   $Count_A=mysqli_num_rows($count_admin);
		
					   ?>
                         <p>Total Admin <span class="float-right"><?php echo $Count_A; ?></span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:50%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                   <hr>
                  <div class="media align-items-center">
                   
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
					   <?php
					   
					   $count_Active_user=mysqli_query($con,"SELECT * FROM admin WHERE status='1' AND Type='Admin' ");
					   $Count_Active=mysqli_num_rows($count_Active_user);
		
					   ?>
                         <p>Active Admin Users <span class="float-right"><?php echo $Count_Active; ?></span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:70%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                    <hr>
                  <div class="media align-items-center">
                  
                     <div class="media-body text-left ml-3">
                       <div class="progress-wrapper">
					   <?php
					   
					   $count_Active_user=mysqli_query($con,"SELECT * FROM admin WHERE status='0' AND Type='Admin'  ");
					   $Count_Active=mysqli_num_rows($count_Active_user);
		
					   ?>
                         <p>Inactive Admin Users <span class="float-right"><?php echo $Count_Active; ?></span></p>
                         <div class="progress" style="height: 5px;">
                          <div class="progress-bar" style="width:35%"></div>
                         </div>
                        </div>                   
                    </div>
                  </div>
                  
              </div>
			

            
        </div>

        </div>

        <div class="col-lg-8">
           <div class="card">
            <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-primary top-icon nav-justified">
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#profile" data-toggle="pill" class="nav-link active"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                </li>
        
                <li class="nav-item">
                    <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                </li>
            </ul>
            <div class="tab-content p-3">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">User Profile</h5>
                    <div class="row">
                        <div class="col-md-6">
						<form method="post" enctype="multipart/form-data">
                            <h6>Name</h6>
                            <p>
                               <?php echo $row['Name']; ?>
                            </p>
                            <h6>Email </h6>
                            <p>
                                <?php echo $row['Email']; ?>
                            </p>
							<h6>Type </h6>
                            <p>
                                <?php echo $row['Type']; ?>
                            </p>
                                <a href="javascript:void();" data-target="#edit" data-toggle="pill" class="btn btn-success">Update Profile</a>
                           
                       
                        </div>
						</form>
          
                    </div>
                    <!--/row-->
                </div>
                
                <div class="tab-pane" id="edit">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="<?php echo $row['Name']; ?>" required="required" name="name">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="<?php echo $row['Email']; ?>" required="required" name="mail">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Change profile</label>
                            <div class="col-lg-9">
                                <input class="form-control" accept="image/jpg, image/png, image/jpeg" type="file" required="required" name="photo">
                            </div>
                        </div>
                      
					   <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Old Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" required="required" maxlength="15" minlength="8" name="opass" value="<?php echo $row['Password']; ?>">
                            </div>
                        </div>
						
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">New Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" required="required" maxlength="15" minlength="8" name="npass">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" required="required" maxlength="15" minlength="8" name="rpass">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-danger" value="Cancel">
                                <input type="submit" class="btn btn-success" value="Save Changes" name="update">
                            </div>
                        </div>
                    </form>
					

                </div>
            </div>
        </div>
      </div>
      </div>
        
    </div>

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
          Copyright © 2022 <?php echo $r_name; ?>
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
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
	
</body>
</html>

<?php
					
	if(isset($_POST['update'])) 
	{
	$name=$_POST['name'];
	$mail=$_POST['mail'];
	$new_password=$_POST['npass'];
	$re_password=$_POST['rpass'];
	
	 $uimage=$_FILES['photo'] ['name'];
	 $uimage_tmp_name =$_FILES['photo']['tmp_name'];
	 $uimage_folder ='updated_photo/'.$uimage;
	
	
		if($new_password != $re_password)
		{
			echo "<script> alert 'Password Not Match'; location.replace('Admin_profile.php');</script>" ;
		}
		else
		{
			
			$update=mysqli_query($con," update admin set Name='$name', Email='$mail' , Password='$new_password' , image='$uimage'  where ID='$admin_ID' ");
		    if($update)
			{
        echo "<script> alert ('Your Profile Updated'); location.replace('Admin_profile.php');</script>" ;
				move_uploaded_file($uimage_tmp_name, $uimage_folder);
       
			}
			else
			{
        echo "<script> alert ('Your Profile Not Updated'); location.replace('Admin_profile.php');</script>" ;
				die(mysqli_error($con));
			}
		}
}
?>
					