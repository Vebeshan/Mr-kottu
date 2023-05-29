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
$r_mail=$mrk_fetch['Email'];
}

else
{
  header('location:login_form.php');
}

?>

<?php

if (isset($_GET['uid'])) {
  $uid=$_GET['uid'];
  
  $select = "select * from message where ID='$uid' ";
  $admin_query = mysqli_query($con, $select);

  if(mysqli_num_rows($admin_query)>0)
  {
    $row1 = mysqli_fetch_array($admin_query);

    $id = $row1['ID'];
    $Name = $row1['Name'];
    $Email = $row1['Email'];
    $subject = $row1['subject'];
    $message = $row1['message'];
  }
 
}
if (isset($_POST['update'])) {
	$name=$_POST['uname'];
	$mail=$_POST['umail'];
	$type=$_POST['user_type'];
	$password=$_POST['upassword'];

  $uimage=$_FILES['photo'] ['name'];
  $uimage_tmp_name = $_FILES['photo']['tmp_name'];
  $uimage_folder = 'updated_photo/'.$uimage;

	$sql=" update admin set Name='$name', Email='$mail', Type='$type',  Password='$password', image='$uimage' where ID=$id ";
	$res=mysqli_query($con,$sql);

	if($res)
	{
    move_uploaded_file($uimage_tmp_name, $uimage_folder);
		header("location:admin.php");
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
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title> Reply Message</title>
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
    <div class="container">
  <!--Start Dashboard Content-->
   <br>
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
         <div class="col-12">
         <div class="card">
            <div class="card-body">
              <br>
              <div class="card-title text-center"><h3><i class="fas fa-envelope"></i> Reply Mail</h3></div><br>
               
            <form method="post" enctype="multipart/form-data">
                    
                   To
                      <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                         <input type="Email" name="usermail"  class="form-control input-shadow" required="required" value="<?php echo $Email; ?>">
                         <div class="form-control-position">
                         <i class="icon-envelope-open"></i>
                  </div>
                  </div>
                  </div>

                  Subject
                      <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                         <input type="text" name="subject"  class="form-control input-shadow" required="required" value="<?php echo $subject; ?>">
                         <div class="form-control-position">
                         <i class="icon-envelope-open"></i>
                  </div>
                  </div>
                  </div>

                  Message
                      <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                      <textarea rows="4" name="message" placeholder="Enter Reply...." class="form-control" required="required" ><?php echo $message; ?></textarea>
      
                         <div class="form-control-position">
                         <i class="icon-envelope-open"></i>
                  </div>
                  </div>
                  </div>

                 Reply
                      <form method="POST">
                      <div class="form-group">
			                <div class="position-relative has-icon-right">
                            <textarea rows="4" name="reply" placeholder="Enter Reply...." class="form-control" required="required"></textarea>
                         <div class="form-control-position">
                         <i class="icon-envelope-open"></i>
                  </div>
                  </div>
                  </div>
    
              
                <center>
                <input type="submit" name="sub" value="Sent" class="btn btn-info  btn-md" >
                <input type="reset" name="res" value="Cancel" class="btn btn-primary btn-md">

                
                </center>
           
            </div>
            </form>
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
        include("connection.php");

   if (isset($_POST['sub'])) {
     $memail = $_POST['usermail'];
     $msubject = $_POST['subject'];
     $mmessage = $_POST['message'];

     $sql = mysqli_query($con, "INSERT INTO reply_mail(Email,subject,message,status) VALUES(' $memail','$msubject','$mmessage','1')");

     if ($sql) {
       echo ("<script> alert(' Reply Message Sent Successfully'); </script>");
         mysqli_query($con,"UPDATE message SET status='1' WHERE ID='$uid' ");
         
     } else {
       echo ("<script> alert('Message Sent Unsuccessfully!');</script>");
     }

   }       
?>



<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	require 'includes/Exception.php';
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';


	require 'vendor/autoload.php';

  if (isset($_POST['sub'])) {
  $memail = $_POST['usermail'];
 // $mname = $_POST['name'];
  $msubject  = $_POST['subject'];
  $mmessage  = $_POST['message'];
  $reply  = $_POST['reply'];


  $mail = new PHPMailer(true);

  try {

    //$mail->SMTPDebug =0;

    $mail->isSMTP();

    $mail->Host = 'smtp.gmail.com';

    $mail->SMTPAuth = true;

    $mail->Username = 'finalprojectgp2022@gmail.com';

    $mail->Password = 'sgcytospmxkuqzhk';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Port = 587;

    $mail->setFrom('finalprojectgp2022@gmail.com');

    $mail->addAddress($memail);

    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Message From MR.KOTTU';

    $html = '<html><head></head><body><div style="background-image: linear-gradient(45deg, #29323c, #485563); color: black; font-family: poppins; text-align:center;width:100%; border-radius: 10px; padding-bottom: 50px;"><h1 style="background:#393836;color:white; border-radius: 5px; padding: 5px;"> Reply From MR.KOTTU </h1>';
    $html .= '<h2 style="color:white; ">Subject : '.$msubject.'</h2>';
    $html .= '<h2 style="color:white; ">Message</h2>';
    $html .= '<textarea style="background:transparent;color:white;text-align:center;" disabled>'.$message.'</textarea>';
    $html .= '<h2 style="color:white; ">Reply</h2>';
    $html .= '<textarea style="background:transparent;color:white;text-align:center;" disabled>'.$reply.'</textarea>';
    $html .= '</div> </body>';
			
					$mail->Body    =$html;
    $mail->send();
      
    exit();

  } catch (Exception $e) {
    echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
  }
}
	mysqli_close($con);
?>




