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
  <title> Reports </title>
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
 
</nav>
</header>
<!--End topbar header-->
<div class="clearfix"></div>
  <div class="content-wrapper">
    <div class="container">
  <!--Start Dashboard Content-->
   <br>

   <?php 
$date = isset($_GET['date']) ? $_GET['date'] : date("Y-m-d");
?>
<div class="content py-5 px-3 bg-gradient-warning">
    <h3 class="text-center"><i class="fas fa-file-alt"></i> Sales Reports</h3>
</div>
<div class="row flex-column mt-4 justify-content-center align-items-center mt-lg-n4 mt-md-3 mt-sm-0">
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-body">
                <fieldset>
                    <legend>Filter</legend>
                    <form action="" id="filter-form">
                        <div class="row align-items-end">
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label for="date" class="control-label">Choose Date</label>
                                    <input type="date" class="form-control form-control-sm rounded-0" name="date" id="date" value="<?= $date ?>" required="required">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <button class="btn btn-sm btn-flat btn-primary bg-gradient-primary"><i class="fa fa-filter"></i> Filter</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-lg-11 col-md-11 col-sm-12 col-xs-12">
        <div class="card rounded-0 mb-2 shadow">
            <div class="card-header py-1">
                
            </div>
            <div class="card-body">
                <div class="container-fluid" id="printout">
                    <table class="table table-bordered">
                        <colgroup>
                            <col width="10%">
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="20%">
                            <col width="15%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th class="px-1 py-1 text-center">#</th>
                                <th class="px-1 py-1 text-center">Time</th>
                                
                                <th class="px-1 py-1 text-center">Customer Name</th>
                                <th class="px-1 py-1 text-center">Product Name</th>
                                <th class="px-1 py-1 text-center">Price</th>
                                <th class="px-1 py-1 text-center">Qty</th>
                                <th class="px-1 py-1 text-center">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $g_total = 0;
                            $i = 1;
                            $stock = $con->query("SELECT * FROM `delivery` where Date(Date) = '{$date}' order by abs(unix_timestamp(Date)) asc");
                            while($row = $stock->fetch_assoc()):
                                $user = $con->query("SELECT * FROM `customer` where Customer_ID= '{$row['Customer_ID']}'");
                                $row['processed_by'] = "N/A";
                                if($user->num_rows > 0){
                                    $row['processed_by'] = $user->fetch_array()[0];
                                }
                                $g_total += $row['Total']; 
                            ?>
                            <tr>
                                <td class="px-1 py-1 align-middle text-center"><?= $i++ ?></td>
                                <td class="px-1 py-1 align-middle text-center"><?= date("h:i A", strtotime($row['Date'])) ?></td>
                               
                                <td class="px-1 py-1 align-middle text-center"><?= $row['Name'] ?></td>
                                <td class="px-1 py-1 align-middle text-center"><?= $row['Product_name'] ?></td>
                                <td class="px-1 py-1 align-middle text-center"><?= $row['price'] ?></td>
                                <td class="px-1 py-1 align-middle text-center"><?= $row['qty'] ?></td>
                                <td class="px-1 py-1 align-middle text-center"><?= $row['Total'] ?></td>
                                
                            </tr>
                            <?php endwhile; ?>
                            <?php if($stock->num_rows <= 0): ?>
                                <tr>
                                    <td class="py-1 text-center" colspan="6">No records found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="6" class="text-center">Total Sales</th>
                                <th class="text-right"><?php echo  $g_total; ?> </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<noscript id="print-header">
    <div>
        <style>
            html{
                min-height:unset !important;
            }
        </style>
        <div class="d-flex w-100 align-items-center">
            <div class="col-2 text-center">
                <img src="<?= validate_image($_settings->info('logo')) ?>" alt="" class="rounded-circle border" style="width: 5em;height: 5em;object-fit:cover;object-position:center center">
            </div>
            <div class="col-8">
                <div style="line-height:1em">
                    <div class="text-center font-weight-bold h5 mb-0"><large><?= $_settings->info('name') ?></large></div>
                    <div class="text-center font-weight-bold h5 mb-0"><large>Daily Sales Report</large></div>
                    <div class="text-center font-weight-bold h5 mb-0">as of <?= date("F d, Y", strtotime($date)) ?></div>
                </div>
            </div>
        </div>
        <hr>
    </div>
</noscript>
<script>
    function print_r(){
        var h = $('head').clone()
        var el = $('#printout').clone()
        var ph = $($('noscript#print-header').html()).clone()
        h.find('title').text("Daily Sales Report - Print View")
        var nw = window.open("", "_blank", "width="+($(window).width() * .8)+",left="+($(window).width() * .1)+",height="+($(window).height() * .8)+",top="+($(window).height() * .1))
            nw.document.querySelector('head').innerHTML = h.html()
            nw.document.querySelector('body').innerHTML = ph[0].outerHTML
            nw.document.querySelector('body').innerHTML += el[0].outerHTML
            nw.document.close()
            start_loader()
            setTimeout(() => {
                nw.print()
                setTimeout(() => {
                    nw.close()
                    end_loader()
                }, 200);
            }, 300);
    }
    $(function(){
        $('#filter-form').submit(function(e){
            e.preventDefault()
            location.href = './?page=reports&'+$(this).serialize()
        })
        $('#print').click(function(){
            print_r()
        })

    })
</script>
<!--Start Back To Top Button-->
<a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
<!--End Back To Top Button-->
     

 
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
  
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
	
	
</body>
</html>

