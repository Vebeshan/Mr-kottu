<?php

include 'connection.php';

session_start();

$admin_name=$_SESSION['admin_name'];
$admin_Email=$_SESSION['admin_Email'];
$admin_Type=$_SESSION['admin_Type'];
$admin_image=$_SESSION['admin_image'];


if($admin_id=isset($_SESSION['admin_id']))
{

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

<?php

if(isset($_POST['sub']))
{
  $uname=$_POST['username'];
  $umail=$_POST['usermail'];
  $utype=$_POST['user_type'];
  $upass=$_POST['userpassword'];
  $cupass=$_POST['cuserpassword'];

  $uimage=$_FILES['photo']['name'];
  $uimage_tmp_name = $_FILES['photo']['tmp_name'];
  $uimage_folder = 'updated_photo/'.$uimage;

  $select=" SELECT * FROM admin WHERE Email='$umail' ";
  $query=mysqli_query($con,$select);
  if(mysqli_num_rows($query) > 0)
  {
    echo " <script type='text/javascript'> alert ('This Mail Already Excist...'); </script> ";
  }
  else
  {
    if($upass !=  $cupass)
    {
      echo " <script type='text/javascript'> alert ('Password Not Matched...'); </script> ";
    }
    else
    {
      $sql="insert into admin(Name,Email,Type,Password,image,status) values('$uname','$umail','$utype','$upass','$uimage','1')";
      $res=mysqli_query($con,$sql);
  
      if($res)
      {
        move_uploaded_file($uimage_tmp_name, $uimage_folder);
        header('location:admin.php');
      }
      else
      {
        echo "Registerd Unsuccessfully...";
      }
    }
      
  
    }
  }
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title> Offers</title>
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

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
   <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
     <div class="brand-logo">
      <a href="Admin_Dashboard.php">
       <img src="updated_photo/<?php echo $mrk_fetch['photo']; ?>" class="logo-icon" alt="logo icon">
       <h5 class="logo-text"><?php echo $r_name; ?> Dashboard</h5>
     </a>
   </div>
   <ul class="sidebar-menu do-nicescrol list-unstyled">
      <li class="sidebar-header"><h4 class="text-center">Hi Welcome Back <?php echo $admin_name; ?> !</h4></li>
      <li>
        <a href="Admin_Dashboard.php">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li>
        <a href="Admin.php">
          <i class="icon-user"></i> <span>Admin</span>
        </a>
      </li>
         
      <li>
        <a href="customer.php">
          <i class="icon-people"></i> <span>Customers</span>
        </a>
      </li>

      <li>
      <a href="order_form.php">
          <i class="zmdi zmdi-card"></i> <span>Orders</span>
        </a>
      </li>
       <li>
        <a href="menu.php">
          <i class="zmdi zmdi-card"></i> <span>Menu</span>
        </a>
      </li>
      <li>
        <a href="product.php">
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
      <li>
        <a href="Messages.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Review</span>
        </a>
      </li>
       <li>
        <a href="Settings.php" target="_blank">
          <i class="zmdi zmdi-lock"></i> <span>Settings</span>
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
    <div class="container">
  <!--Start Dashboard Content-->
   <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         <div class="col-12">
         <div class="card">
            <div class="card-body">
              <br>
              <div class="card-title text-center"><h3><i class="zmdi zmdi-accounts-add"></i> Add Offers</h3></div><br>
               
            <form method="post" enctype="multipart/form-data">
              <?php

              $food_select=mysqli_query($con,"SELECT * FROM products WHERE status='1' ");


              ?>
                     
                    Foods
                     <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                     <select name="user_type" class="form-control input-shadow" required>
                        <option value="Admin">Admin</option>
                    </select>
                    <div class="form-control-position">
					            <i class="zmdi zmdi-account"></i>
                  </div>
                  </div>
                  </div>

                  Offer Type
                     <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                     <select name="user_type" class="form-control input-shadow" required>
                        <option value="Special Offer">Special Offer</option>
                        <option value="Limited  Offer">Limited  Offer</option>
                    </select>
                    <div class="form-control-position">
					            <i class="zmdi zmdi-account"></i>
                  </div>
                  </div>
                  </div>
                 
                  Price
                  <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                   <input type="number"
                 name="userpassword" placeholder="Enter Price " class="form-control" required="required">
                <div class="form-control-position">
                <i class="icon-lock"></i>
                  </div>
                  </div>
                  </div>

                  Photo 
                  <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                   <input type="file"  name="photo" placeholder="Select An Image" class="form-control" required="required" accept="image/jpg, image/png, image/jpeg">
                   <div class="form-control-position">
                   <i class="zmdi zmdi-book-image"></i>
                  </div>
                  </div>
                  </div>
              
                <center>
                <input type="submit" name="sub" value="Add" class="btn btn-info  btn-md" >
                <input type="reset" name="res" value="Cancel" class="btn btn-primary btn-md">

                
</center>
           
            </div>
            </form>
         </div>
      </div>
    </div>
   </div>
   <br><br>
 


    <!--start overlay-->
    <div class="overlay toggle-menu"></div>
    <!--end overlay-->
 
  </div>
  <!-- End container-fluid-->
 </div><!--End content-wrapper-->
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