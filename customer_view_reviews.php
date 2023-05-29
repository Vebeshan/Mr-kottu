<?php

include 'connection.php';
session_start();

if(isset($_SESSION['id']))
{
  $Customer_ID=$_SESSION['id']; 
  $customer=mysqli_query($con,"SELECT * FROM customer WHERE Customer_ID ='$Customer_ID' ");
  $customer_fetch=mysqli_fetch_array($customer);
 
  if(mysqli_num_rows($customer)>0)
  {
      $customer_ID=$customer_fetch['Customer_ID'];
      $customer_name=$customer_fetch['Name'];
	  $customer_Address=$customer_fetch['Address'];
	  $customer_Tel_no=$customer_fetch['Tel_no'];
      $customer_E_mail=$customer_fetch['E_mail'];
      $customer_photo=$customer_fetch['photo'];
  }
}
else
{
    header('location:Customer_Login.php');
}

?>

<?php

if(isset($_GET['did']))
{
	$did=$_GET['did'];

	$sql="delete from review where ID=$did";

	$res=mysqli_query($con,$sql);
	if($res)
	{
		header("location:customer_view_reviews.php");
	}
	else
	{
		die(mysqli_error($con));
	}
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>View Reviews</title>
  <!-- plugins:css -->
    <!-- Favicons -->
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    
  <link rel="stylesheet" href="customer_vendors/feather/feather.css">
  <link rel="stylesheet" href="customer_vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="customer_vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="customer_vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="customer_vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="customer_vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" type="text/css" href="customer_js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="customer_css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/Mr.K logo.JPG" />
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="Customer_Dashboard.php"><img src="images/mrk_img3.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="Customer_Dashboard.php"><img src="images/Mr.K logo.JPG" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
       
        <ul class="navbar-nav navbar-nav-right">
        <?php
            
            $select_notifi=mysqli_query($con,"SELECT * FROM notifications WHERE type='Delivered' AND status='unread' AND Customer_ID='$customer_ID' ");
            
            $count_notifi=mysqli_num_rows($select_notifi);
            
            
            ?>


          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="icon-bell mx-0"></i>
              <span class="count"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications(<?php echo $count_notifi; ?>)</p>


              <a class="dropdown-item preview-item" href="cart.php">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-cart mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Cart Details</h6>
                </div>
              </a>

              <a class="dropdown-item preview-item" href="Customer_Pending_orders.php">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-silverware mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-normal">Order Details <span class="text-warning"><?php echo $count_notifi; ?></span></h6>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="updated_photo/<?php echo $customer_photo; ?>" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="Customer_profile.php">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item" href="customer_logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div>
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
    
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="Customer_Dashboard.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-account-box menu-icon"></i>
              <span class="menu-title">Account</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="Customer_profile.php">Manage Account</a></li>
                <li class="nav-item"> <a class="nav-link" href="Customer_profile.php">Forget Password</a></li>
               
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="mdi mdi-silverware menu-icon"></i>
              <span class="menu-title">Orders</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="Customer_Pending_orders.php">Pending Orders</a></li>
                 <li class="nav-item"><a class="nav-link" href="Customer_cancelled_orders.php">Cancelled Orders</a></li>
                <li class="nav-item"><a class="nav-link" href="Customer_deliverd_orders.php">Deliverd Orders</a></li>
              </ul>
            </div>
          </li>

            <li class="nav-item">
            <a class="nav-link" href="customer_view_reviews.php">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Review</span>
            </a>
          </li>
               <li class="nav-item">
            <a class="nav-link" href="index.php">
            <i class="mdi mdi-earth menu-icon"></i> 
              <span class="menu-title"> Visit Mr Kottu</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
        
        <?php
        
        $Select=mysqli_query($con,"select * from review WHERE Customer_ID='$customer_ID' order by Date DESC");
        
        ?>
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-center"><b>Your Reviews</b></h3>
                    <?php 
                    
                    $find_delivery=mysqli_query($con,"SELECT * FROM delivery WHERE Customer_ID='$customer_ID' ");
                    
                    if(mysqli_num_rows($find_delivery)>0)
                    {
                        $rev='<a href="customer_review.php" class="btn btn-info btn-md"> + Create Review </a>';
                    }
                    else
                    {
                        $rev="<h4 class='text-center text-warning'>You Can Make A Review After Your Food Delivery</h4>";
                    }
                    
                    ?>
                   <?php echo $rev; ?>
                    <br>
                    <table class="table table-bordered table-responsive">
                        <tr class="text-center">
                        <th>Date</th>
                            <th>From</th>
                            <th>To</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Rating</th>
                            <th colspan="2">Action</th>
                        </tr>
                        <?php 
                        
                        if(mysqli_num_rows($Select)>0)
                        {
                            while($review=mysqli_fetch_assoc($Select))
                            { 
                                $id=$review['ID'];
                             ?>
                        
                        <tr class="text-center">
                        <th><?php echo $review['Date']; ?></th>
                        <th><?php echo $review['From_mail']; ?></th>
                        <th><?php echo $review['To_mail']; ?></th>
                        <th><?php echo $review['Subject']; ?></th>
                        <th><?php echo $review['Message']; ?></th>
                        <th><?php echo $review['Rating']; ?></th>
                        <th>
<a <?php echo 'href="customer_review_update.php?uid='.$id.' "'; ?> class="btn btn-md btn-success" ><i class="fas fa-edit"></i>Update</a>
  <a <?php echo 'href="customer_view_reviews.php?did='.$id.' "'; ?> class="btn btn-md btn-danger" onclick="return confirm('Are your sure you want to delete this Review?');"><i class="fas fa-trash"></i>Delete</a> </th></tr>
                            
                            <?php } }
                        else
                        {
                            echo "<h4 class='text-center text-warning'> No Reviews Here...</h4>";
                        }
                         ?>  

                    </table>
                </div>
              </div>
            </div>
           
       <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©2022<a href="#" target="_blank"> Mr Kottu </a> All rights reserved. </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">..... <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Developed by <a href="developer.php" target="_blank">Developer Kids</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="customer_vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="customer_vendors/chart.js/Chart.min.js"></script>
  <script src="customer_vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="customer_vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="customer_js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="customer_js/off-canvas.js"></script>
  <script src="customer_js/hoverable-collapse.js"></script>
  <script src="customer_js/template.js"></script>
  <script src="customer_js/settings.js"></script>
  <script src="customer_js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="customer_js/dashboard.js"></script>
  <script src="customer_js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

