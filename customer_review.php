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
    $status=mysqli_query($con,"SELECT * FROM resturent");
    $status_fetch=mysqli_fetch_assoc($status);
    
    $MAIL=$status_fetch['Email'];
}
else
{
    header('location:Customer_Login.php');
}

?>


<?php

if(isset($_POST['save']))
{
    $Subject=$_POST['Subject'];
    $Messagae=$_POST['Messagae'];
    $Rating=$_POST['Rating'];
    
    $insert=mysqli_query($con,"INSERT INTO review(Customer_ID,Name,image,From_mail,To_mail,Subject,Message,Rating,Date) VALUES('$customer_ID','$customer_name','$customer_photo','$MAIL','$customer_E_mail','$Subject','$Messagae','$Rating',now())");
    
    if($insert)
    {
  echo "<script> alert('Your Review Is Submitted'); location.replace('customer_view_reviews.php'); </script> ";  
    }
    else
    {
echo "<script> alert('Your Review Not Submitted'); location.replace('customer_view_reviews.php'); </script> "; 
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Customer Review</title>
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
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-center"><b> <i class="icon-paper menu-icon"></i> Make A Review</b></p>

                  <form class="forms-sample" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="exampleInputUsername1">From</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username"
                             value="<?php echo $customer_E_mail;  ?>" required="required" name="from_mail" disabled>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">To</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Username"
                             value="<?php echo $status_fetch['Email']; ?>" required="required" name="To_mail" disabled>
                    </div>
                  
                    <div class="form-group">
                        <label for="exampleInputUsername1">Foods</label>
                        <select class="form-control" required  name="Subject">
                             <option value="">Please Select...</option>
                        <?php
                        $myfood=mysqli_query($con,"SELECT * FROM order_details WHERE status='1' AND Customer_ID='$customer_ID' ");
                        
                        while($food_fetch=mysqli_fetch_array($myfood))
                        {?>

                          <option value="<?php echo $food_fetch['Product_Name']; ?>"><?php echo $food_fetch['Product_Name']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                      
                      <div class="form-group">
                          <label for="exampleInputEmail1">Messagae</label>
                     <textarea maxlength="100" minlength="10" placeholder="Tell somthing About Service Or Product Quality..." class="form-control" name='Messagae' required></textarea>
                    </div>
                      
                      <div class="form-group">
                        <label for="exampleInputUsername1" >Rating</label>
                      <select class="form-control" name="Rating" required>
                          <option value="">Please Select...</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          
                        </select>
                    </div>
                      
                    <center>
                    <button type="submit" class="btn btn-primary mr-2" name="save"><i class="mdi mdi-telegram"></i> Sent Review</button>
                    <input type="reset" class="btn btn-light" value="Cancel">
                        </center>
                  </form>
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

