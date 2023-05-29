<?php

include 'connection.php';

session_start();

if(isset($_SESSION['admin_id']))
{
  $admin_ID=$_SESSION['admin_id'];

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

  <link rel="stylesheet" href="assets/fontawesome/all.min.css">
<script src="assets/fontawesome/all.min.js"></script>
   

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
      <i class="fas fa-utensils"></i> <span>Orders</span>
          <?php 
          $new_order=mysqli_query($con,"SELECT * FROM order_details WHERE status='0' and Cancel_status='0' ");
          if(mysqli_num_rows($new_order)>0)
          {
              $new='<small class="badge float-right badge-light">New</small>';
          }
          else
          {
              $new=" ";
          } 
      echo $new;
          ?>
        </a>
      </li>
       <li>
        <a href="menu.php">
        <i class="fas fa-utensils"></i> <span>Menu</span>
        </a>
      </li>
      <li>
        <a href="product.php">
        <i class="fas fa-utensils"></i> <span>Foods</span>
        </a>
      </li>
    
       <li>
        <a href="Galary.php">
        <i class="fas fa-images"></i> <span>Galary</span>
        </a>
      </li>

      <li>
        <a href="Reports.php">
        <i class="fas fa-file"></i> <span>Reports</span>
        </a>
      </li>

      <li>
        <a href="Messages.php" >
        <i class="fas fa-envelope"></i> <span>Messages</span>
             <?php 
          $new_order=mysqli_query($con,"SELECT * FROM message WHERE status='0' ");
          if(mysqli_num_rows($new_order)>0)
          {
              $new='<small class="badge float-right badge-light">New</small>';
          }
          else
          {
              $new=" ";
          } 
      echo $new;
          ?>
        </a>
      </li>
      <li>
        <a href="reveiw.php" >
        <i class="fas fa-reply"></i> <span>Review</span>
             <?php 
          $new_order=mysqli_query($con,"SELECT * FROM review WHERE status='0' ");
          if(mysqli_num_rows($new_order)>0)
          {
              $new='<small class="badge float-right badge-light">New</small>';
          }
          else
          {
              $new=" ";
          } 
      echo $new;
          ?>
        </a>
      </li>
       <li>
        <a href="Settings.php" >
        <i class="fas fa-tools"></i> <span>Settings</span>
        </a>
      </li>
       <li>
        <a href="home_page_setting.php" >
        <i class="fas fa-tools"></i> <span>Home Page Setting</span>
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

  
<a href="index.php" target="_blank" class="btn btn-outline-white">Vist Mr Kottu</a>   
  <ul class="navbar-nav align-items-center right-nav-link">
  
  
             <?php   
                  $cancel_count=mysqli_query($con,"SELECT * from `notifications` where `status` = 'unread' AND type='Cancel Order' order by `date` DESC LIMIT 10 ");
                   $Total_count_count=mysqli_num_rows($cancel_count);
                   
                  ?>
                  
                  
  <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="Admin_profile.php">
        <span class="user-profile"><i class="fas fa-utensils"></i> </span><span class="badge badge-light"> <?php echo  $Total_count_count; ?></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div><a href="customer_cancel_view.php"></a></div>
            <div class="media-body">
            <a href="customer_cancel_view.php"><h6 class="mt-2 user-title">Notification</h6></a>
            <a href="customer_cancel_view.php"><p class="user-subtitle">Order Cancel</p></a>
            </div>
           </div>
          </a>
        </li>
       <?php while($date=mysqli_fetch_assoc($cancel_count))
                {
                  $u_name=$date['name'];
                  $cancel_id=$date['id'];
    
                    ?>
    
        <li class="dropdown-divider"></li>
       <a <?php echo 'href="customer_cancel_view.php?cancel='.$cancel_id.' "'; ?> ><li class="dropdown-item"><i class="icon-envelope mr-2"></i><?php echo $date['date']; ?>
            <br><?php echo $date['name']; ?> <br>Request For <?php echo $date['type']; ?><br></a>
        <li class="dropdown-divider"></li>
        <li class="dropdown-divider"></li>
        <?php } ?>
      </ul>
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
        <a href="Messages.php"><li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="Admin_profile.php"><li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li></a>
        <a href=""><li class="dropdown-divider"></li></a>
        <a href="Settings.php"><li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li></a>
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

   <!--1st Row Start-->
	<div class="card mt-3 shadow-sm">
    <div class="card-content">
        <div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from delivery");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="Notification.php"><h5 class="text-white mb-0">Deliverd Orders <i class="fa fa-shopping-cart"></i> <span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
            
            <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from order_cancel WHERE status='1' ");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="Order_History.php"><h5 class="text-white mb-0">Canceled Orders <i class="fa fa-shopping-cart"></i><span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
            
            
            <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from order_details WHERE status='0' AND Cancel_status='0' ");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="order_form.php"><h5 class="text-white mb-0">Pending Orders <i class="fa fa-shopping-cart"></i><span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
        </div>
    </div>
 </div>  
 <!--1st Row End-->

 <!--2nd Row Start-->
 <div class="card mt-3 shadow-sm">
  <div class="card-content">
      <div class="row row-group m-0">
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from products");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="product.php"><h5 class="text-white mb-0">Total Foods  <i class="fas fa-utensils"></i> <span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
          
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                   $product_count=mysqli_query($con,"select * from products where status='1' ");
                   $pcount=mysqli_num_rows($product_count);
                  ?>
                  
                  <a href="product.php"><h5 class="text-white mb-0">Avilable Foods  <i class="fas fa-utensils"></i> <span class="float-right"><?php echo $pcount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
          
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from special_menu");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="menu.php"><h5 class="text-white mb-0">Trending Menus  <i class="fas fa-utensils"></i> <span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
      </div>
  </div>
</div>  
<!--2nd Row End-->
        
<!--3rd Row Start-->
<div class="card mt-3 shadow-sm">
  <div class="card-content">
      <div class="row row-group m-0">
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from customer");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="customer.php"><h5 class="text-white mb-0">Total Customers <i class="fas fa-user-friends"></i><span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
          
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from customer");
                  $message_count=mysqli_query($con,"select * from message");

                   $message=mysqli_num_rows( $message_count);
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                <h5 class="text-white mb-0">Total Views <i class="fa fa-eye"></i><span class="float-right"><?php echo $cucount+$message ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5>
              </div>
          </div>
          
          <div class="col-12 col-lg-6 col-xl-4 border-light">
              <div class="card-body">
                  <?php   
                  $customer_count=mysqli_query($con,"select * from customer");
                   $cucount=mysqli_num_rows( $customer_count);
                  ?>
                  
                  <a href="Messages.php"><h5 class="text-white mb-0">Messages <i class="fas fa-envelope"></i><span class="float-right"><?php echo $cucount ?> <i class="zmdi zmdi-long-arrow-up"></i></span></h5></a>
              </div>
          </div>
      </div>
  </div>
</div>  
<!--3rd Row End-->
	
	<div class="row">
	 <div class="col-12 col-lg-12">
	   <div class="card">
	     <div class="card-header"><i class="fas fa-utensils"></i> Recent Food Orders
		  <div class="card-action">
             <div class="dropdown">
             <a href="javascript:void();" class="dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown">
              <i class="icon-options"></i>
             </a>
              <div class="dropdown-menu dropdown-menu-right">
              <a href="order_form.php" class="dropdown-item" href="">View All</a>
               </div>
              </div>
             </div>
		 </div>
     <?php

$order_sql="select * from  order_details WHERE Cancel_status='0' AND status='0' ORDER BY Date DESC LIMIT 20 ";
$order_res=mysqli_query($con,$order_sql);

echo "<div class='container-fluid ' >";

	     echo '<div class="col-lg-12">
             <div class="card">
             <div class="card-body">
            <div class="card-title text-center"><h3>Recent Orders</h3></div>
            <br>
           <div class="table-responsive">
           <table class="table table-bordered">
             <thead>
               <tr>
                 <th scope="col">Date</th>
                 <th scope="col">Customer Name</th>
                  <th scope="col">Customer Phone_NO</th>
                   <th scope="col">Customer Address</th>
                 <th scope="col">Food Name</th>
                 <th scope="col">Price</th>
                 <th scope="col">Qty</th>
                 <th scope="col">Total</th>
               </tr>
             </thead>';

             if(mysqli_num_rows($order_res)>0)
             {

             

        while($order_fetch = mysqli_fetch_array($order_res))   
      {
            $status=$order_fetch['status'];
            $id=$order_fetch['Order_ID'];

        	echo "<tbody><tr><th  scope='row'>". $order_fetch['Date']."</th>";
        	echo "<td>". $order_fetch['Name']."</td>";
          echo "<td>". $order_fetch['Tel_no']."</td>";
          echo "<td>".$order_fetch['Address']."</td>";
            echo "<td>".$order_fetch['Product_Name']."</td>";
            echo "<td>".$order_fetch['Price']."</td>";
            echo "<td>".$order_fetch['Qty']."</td>";
            echo "<td>Rs ".$order_fetch['Total']."</td>"; ?>
          
         
              
							

       <?php } }
       else
       {
         echo "<tr><th colspan='8'><h5 class='text-center text-warning'>No Orders Available...</th></tr>";
       }
            echo "</tr></tbody></table> </div>
            </div>
          </div>
        </div>
      </div>";
            mysqli_close($con);
?><!--End Row-->

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
