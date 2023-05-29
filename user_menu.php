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

<?php

if(isset($_POST['ADD']))
{
  $type=$_POST['type'];

  $select_product=mysqli_query($con,"SELECT * FROM products WHERE Product_Name='$type' ");
  $select_product_fetch=mysqli_fetch_assoc($select_product);

                  $Pro_type=$select_product_fetch['Type'];
                  $price=$select_product_fetch['Price'];
                  $image=$select_product_fetch['image'];

                  $select=" SELECT * FROM special_menu WHERE Name='$type' ";
                  $query=mysqli_query($con,$select);
                  if(mysqli_num_rows($query) > 0)
                  {
                    echo "<script type='text/javascript'> alert ('This Menu Already Added...'); </script>";
                  }
                  else
                  {
                      $sql="insert into special_menu(Name,Category,price,photo) values('$type','$Pro_type','$price','$image')";
                      $res=mysqli_query($con,$sql);
                  
                      if($res)
                      {
                          echo " <script type='text/javascript'> alert ('Menu Added...'); </script> ";
                        header('location:user_menu.php');
                      }
                      else
                      {
                         echo " <script type='text/javascript'> alert ('Canot Add The Menu Already...'); </script> ";
                      }
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
  <title> Menu </title>
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

  <link href="assets/css/toogle.css" rel="stylesheet"/>

<link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/Owl_styles.css">

<link rel="stylesheet" href="assets/fontawesome/all.min.css">
<script src="assets/fontawesome/all.min.js"></script>
   

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
    <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li>
  </ul>
     
    <ul class="navbar-nav align-items-center right-nav-link">
  <li class="nav-item dropdown-lg">
        <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="#">
           <div class="media">
           <?php   
                  $cancel_count=mysqli_query($con,"SELECT * from `notifications` where `status` = 'unread' AND type='Cancel Order' order by `date` DESC LIMIT 10 ");
                   $Total_count_count=mysqli_num_rows($cancel_count);
                   
                  ?>
            <div class="media-body">
            <a href="customer_cancel_view.php"><h6 class="mt-2 user-title">Order Cancel Notification</h6></a>

            <?php while($date=mysqli_fetch_assoc($cancel_count))
                {
                  $u_name=$date['name'];
                  $cancel_id=$date['id'];
    
                    ?>
           
            </div>
           </div>
          </a>
        </li>
    
        <li class="dropdown-divider"></li>
       <a <?php echo 'href="customer_cancel_view.php?cancel='.$cancel_id.' "'; ?> ><li class="dropdown-item"><i class="icon-envelope mr-2"></i><?php echo $date['date']; ?>
            <br><?php echo $date['name']; ?> <br>Request For <?php echo $date['type']; ?><br></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-divider"></li>
        <?php } ?>
       
      </ul>
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                
        
      <i class="fas fa-comment-alt"></i>
 <span class="badge badge-light"> <?php echo  $Total_count_count; ?></span></i></a>
    </li>
    <li class="nav-item dropdown-lg">
        <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="Notification.php">
           <div class="media">
            <?php   
                  $customer_count=mysqli_query($con,"SELECT * from `notifications` where `status` = 'unread' AND type='ORDER' order by `date` DESC LIMIT 10 ");
                   $cucount=mysqli_num_rows( $customer_count);
                   
                  ?>
            <div class="media-body">
            <a href="Notification.php"><h6 class="mt-2 user-title">Order Notification</h6></a>
           
            </div>
           </div>
          </a>
        </li>
             <?php while($date=mysqli_fetch_assoc($customer_count))
                {
                  $u_name=$date['name'];
                  $cancel_id=$date['id'];
    
                    ?>
    

        <li class="dropdown-divider"></li>
       <a  href="Notification.php" ><li class="dropdown-item"><i class="icon-envelope mr-2"></i><?php echo $date['date']; ?>
            <br><?php echo $date['name']; ?> <br>Request For <?php echo $date['type']; ?><br></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-divider"></li>
           
            <?php    } ?>
             <center><a href="Notification.php" class="text-info p-5">View All</a></center>
       
      </ul>
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                
        
      <i class="fas fa-bell"></i>
 <span class="badge badge-light"><?php echo $cucount ?></span></i></a>
    </li>
   
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="profile.php">
        <span class="user-profile"><img src="updated_photo/<?php echo $row['image']; ?>" class="img-circle" alt="Admin user"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><a href="profile.php"><img class="align-self-start mr-3" src="updated_photo/<?php echo $row['image']; ?>" alt="user avatar"></a></div>
            <div class="media-body">
            <a href="profile.php"><h6 class="mt-2 user-title"><?php echo $row['Name']; ?></h6></a>
            <a href="profile.php"><p class="user-subtitle"><?php echo $row['Email']; ?></p></a>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <a href=""><li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="profile.php"><li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li></a>
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
                <?php
          include 'connection.php';
             

                 echo'<section id="slider" class="pt-5">
                     <div class="container">
                     <h3 class="text-center"><b>Special Menus</b></h3><div class="slider">'  ;
          
                    $select_menu=mysqli_query($con,"SELECT * FROM special_menu");
                    if(mysqli_num_rows($select_menu)>0)
                    {
                        echo '<div class="owl-carousel">';
                        while($special_fetch=mysqli_fetch_assoc($select_menu))
                              { 
                                 $id=$special_fetch['ID'];?>
				                <div class="slider-card">
                                <div class="d-flex justify-content-center align-items-center mb-4">
                                    <img src="updated_photo/<?php echo $special_fetch['photo']; ?>" height="250" alt="Special_menu" >
                                </div>
                                <h5 class="mb-0 text-center"><b><?php echo $special_fetch['Name']; ?></b></h5>
                                <p class="text-center p-4">Category : <?php echo $special_fetch['Category']; ?>
                                    <br>Price : Rs <?php echo $special_fetch['price']; ?></p>
                            </div>
  
                              <?php } } ?>
					
				</div>
			</div>
  </div>
</section>


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
      
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" ></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	<script src="assets/js/Owl_script.js"></script>
 
</body>
</html>