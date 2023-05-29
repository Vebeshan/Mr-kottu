<?php

include 'connection.php';
session_start();

if(isset($_SESSION['id']))
{
   $user_id=($_SESSION['id']);
    
   $sql="SELECT * FROM customer WHERE Customer_ID='$user_id' ";
   $res=mysqli_query($con,$sql);
   $row=mysqli_fetch_assoc($res);
   if(mysqli_num_rows($res)>0)
{
  $customer_name=$row['Name'];
  $customer_E_mail=$row['E_mail'];
  $customer_Tel_no=$row['Tel_no'];
  $customer_Address=$row['Address'];
      

       $login_customer1="Account";
       $login_customer2="Logout";
}
    else
    {
        $login_customer1="Register";
        $login_customer2="Login";
    }

}

else
{     
      $login_customer1="Register";
      $login_customer2="Login";
      header('location:Customer_Login.php');
     
}

$status=mysqli_query($con,"SELECT * FROM resturent");
$status_fetch=mysqli_fetch_assoc($status);
$available=$status_fetch['status'];

if($available==0 )
{
    header('location:index.php');
}

?>

<?php

$cart_count=mysqli_query($con,"SELECT * FROM cart WHERE Customer_ID='$user_id' ");
$c_count=mysqli_num_rows($cart_count);

if($c_count=='0')
{
   echo "<script>location.replace('cart.php'); </script>";
}

?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Checkout</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">  
	<link href="assets_for_home/css/mystyle.css" rel="stylesheet">	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
	<!-- Vendor CSS Files -->
    <link href="assets_for_home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets_for_home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets_for_home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <style>::-webkit-scrollbar {
                                  width: 8px;
                                }
                                /* Track */
                                ::-webkit-scrollbar-track {
                                  background: #f1f1f1; 
                                }
                                 
                                /* Handle */
                                ::-webkit-scrollbar-thumb {
                                  background-color:#ffb03b; 
                                }
                                
                                /* Handle on hover */
                                ::-webkit-scrollbar-thumb:hover {
                                  background-color:#ffb03b;
                                }
   




.close {
    color: #000;
    cursor: pointer;
}

.close:hover {
    color: #000;
}


.theme-color{

    color: #ffb03b;
}
hr.new1 {
    border-top: 2px dashed #fff;
    margin: 0.4rem 0;
}


.btn-primary {
    color: #fff;
    background-color:#ffb03b;
    border-color: #ffb03b;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px;
}


.btn-primary:hover {
    color: #fff;
    opacity: 80%;
    padding: 12px;
    padding-right: 30px;
    padding-left: 30px;
    border-radius: 1px;
    font-size: 17px;
}</style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body width="100%" style="background-image:url(assets_for_home/img/chefs-bg.png); background-attachment:fixed; overflow: hidden;">
       <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <!-- NAVBAR -->
    <header id="header" class="site-navbar mt-3 d-flex align-items-center header-transparent" >
      <div class="container-fluid" >
        <div class="row align-items-center" >
          <div class="site-logo col-6" >
          <a href="index.php" style="font-size:24px; color: #ffb03b;"><b><?php echo $status_fetch['resturent_Name']; ?></b></a></div>

          <nav class="mx-auto site-navigation">
            <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0 myclass">
              <li><a href="index.php" class="nav-link active">Home</a></li>
              <li><a href="About_mrkottu.html">About</a></li>
              <li class="has-children">
                <a href="#ftco-section">Menu</a>
                <ul class="dropdown">
                  <li> <a href="kottu.php">Kottu</a></li>
                  <li><a href="Cheesekottu.php">Cheese Kottu</a></li>
				      <li><a href="Barrota.php">Barotta</a></li>
                  <li><a href="Noodles.php">Noodles</a></li>
				      <li><a href="Bites.php">Bites</a></li>
                  <li><a href="Specially.php">Specialty</a></li>
                </ul>
              </li>
              <li><a href="food_gallery.php">Gallery</a></li>
			   <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart <span class="badge badge-light"><?php echo $c_count; ?></span></a></li>
              <li class="has-children">
                <a href="#ftco-section"><i class="fas fa-user"></i> Profile</a>
                <ul class="dropdown">
                  <li><a href="Customer_Dashboard.php"><?php echo  $login_customer1; ?></a></li>
                  <li><a href="customer_logout.php"><?php echo  $login_customer2; ?></a></li>   
                </ul>
              </li>
			  
              
            </ul>
          </nav>
    
         <div class="right-cta-menu text-right d-flex aligin-items-center col-6">
            <div class="ml-auto">
            
            </div>
            <a href="#" class="site-menu-toggle js-menu-toggle d-inline-block d-xl-none mt-lg-2 ml-3"><span class="icon-menu h3 m-0 p-0 mt-2"></span></a>
          </div>

        </div>
      </div>
    </header>
	
    <br><br><br><br><br><br>
      
<div class="container">
  <main>
    <div class="py-5 text-center">
      <img class="d-block mx-auto mb-4" src="updated_photo/<?php echo $status_fetch['photo']; ?>" alt="logo">
      <h2 style="font-size:26px;"><b>Checkout Form</b></h2>
    </div>

    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
       
     
      </div>
    
      <div class="col-md-12" style="background: #0000006b; font-size:16px;"><br>
        <h3 class=" text-white">Billing address</h3>
        <br>
        <form method="post" >
            <div class="col-12 mt4">
              <label for="lastName" class="form-label">Name</label>
              <input type="text" class="form-control" name="Name"  value="<?php echo $customer_name; ?>" style="font-size:14px;" required disabled>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
            <br>
            <div class="col-12">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="<?php echo $customer_E_mail; ?>" style="font-size:14px;" required disabled>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>
            <br>
            <div class="col-sm-12">
              <label for="lastName" class="form-label">Contact Number</label>
              <input type="text" class="form-control" name="Number"  value="<?php echo $customer_Tel_no; ?>" style="font-size:14px;" required disabled>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <br>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" name="address"  value="<?php echo $customer_Address; ?>" style="font-size:14px;" required disabled>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div> 

       

          <hr class="my-4">

          <h4 class="mb-3">Payment</h4>

          <div class="my-12">
            <div class="form-check">
              <input id="credit" name="paymentMethod" type="radio" class="form-check-input bg-warning" checked required>
              <label class="form-check-label" for="credit">Cash On Delivery</label>
            </div>
              <hr class="my-4">
            <center>
                <a href="cart.php" class="btn btn-primary">Edit </a>
                    <input type="submit" class="btn btn-primary" value="Process To Checkout" name="check" onclick="return confirm('Are You Sure To Process To Checkout ?');">
            </center>
              </form>
            <section class="shopping-cart text-white">
   

   <h1 class="text-center bold"><b>shopping cart</b></h1><br>
    <center>
   <table class="table table-responsive row col-lg-12 text-white">

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE Customer_ID='$user_id' ");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                
                $pname=$fetch_cart['Name'];
                $price=$fetch_cart['Price'];
                $qty=$fetch_cart['Qty'];

               
         ?>

         <tr>
         <form action="" method="post">
            <td><img src="updated_photo/<?php echo $fetch_cart['Image']; ?>" height="100px" width="120px" alt=""></td>
            <td><?php echo $fetch_cart['Name']; ?></td>
            <td>Rs<?php echo number_format($fetch_cart['Price']); ?>/-</td>
            <td>
                  <input type="number" name="update_quantity"  min="1"   min="10" value="<?php echo $fetch_cart['Qty']; ?>" style="background-image: white; color: white; text-align: center; font-size: 15px;" disabled>
                  
            </td>
            <td>Rs<?php echo $sub_total = ($fetch_cart['Price'] * $fetch_cart['Qty']); ?>/-</td>
            <!-- Multiply the Amount into Price-->
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         }
         ?>
         <tr class="table-bottom">
            <td><a href="foodmenu.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3" class="text-center">grand total</td>
            <td>Rs<?php echo $grand_total; ?>/-</td>
         </tr>
       </form>
      </tbody>

   </table>
    </center>

</section>

          

          
   <?php

if(isset($_POST['check'])){
   

   $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE Customer_ID='$user_id'");
   
   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){

		  $p_Name=$product_item['Name'];
		  $P_Price=$product_item['Price'];
		  $P_Qty=$product_item['Qty'];
          $product_price =($P_Price * $P_Qty);

         $product_name[] = $p_Name . ' ' .'Qty' .' (' . $P_Qty .') '.'Price'.' (' .  $P_Price .') ';
         
		  $detail_query = mysqli_query($con, "INSERT INTO `order_details`(Date,Customer_ID,Name,Product_Name,Price,Qty,Total,status,E_mail,Tel_no,Address) VALUES(now(),'$user_id','$customer_name','$p_Name','$P_Price','$P_Qty','$product_price','0','$customer_E_mail','$customer_Tel_no','$customer_Address')") or die('query failed');
        
      
      };
   };

   $total_product = implode(', ',$product_name);
   mysqli_query($con,"INSERT INTO orders_info(Date,Customer_ID,Name,Product_Info,Total,status,E_mail,Tel_no,Address) VALUES(now(),'$user_id','$customer_name','$total_product','$grand_total','0','$customer_E_mail','$customer_Tel_no','$customer_Address')");


   

   if($cart_query && $detail_query){
       
echo "<script> alert ('Your Order Confirmed Thanks For Ordering.'); location.replace('Customer_Pending_orders.php');</script> ";
       
       mysqli_query($con,"DELETE FROM cart WHERE Customer_ID='$user_id' ");
       mysqli_query($con,"INSERT INTO notifications(name,type,message,status,date,Customer_ID)
                     VALUES('$customer_name','ORDER','$total_product','Unread',now(),'$user_id')");
   }
    else
    {
        $warning_msg[]= 'Something went wrong!';
    }
    
}

?>


  <!-------------------------Mail Function Start--------------------------------->

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'includes/Exception.php';
require 'includes/PHPMailer.php';
require 'includes/SMTP.php';


require 'vendor/autoload.php';
$sql1 = "select * from orders_info order by Order_ID desc limit 1";
  $res2 = mysqli_query($con,$sql1);
  $row1 = mysqli_fetch_array($res2);
  $oid= $row1[0];

if(isset($_POST["check"])) {
  
  $sql = "SELECT * FROM orders_info WHERE Order_ID='$oid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

    $cname = $row['Name'];
    $pinfo = $row['Product_Info'];
    $Tel = $row['Tel_no'];
    $address = $row['Address'];
    $total = $row['Total'];
    $date = $row['Date'];

    $mail= new PHPMailer(true);

    try{
  
      //$mail->SMTPDebug =0;
  
      $mail->isSMTP();
  
      $mail->Host = 'smtp.gmail.com';
  
      $mail->SMTPAuth = true;
  
      $mail->Username ='finalprojectgp2022@gmail.com';
  
      $mail->Password ='sgcytospmxkuqzhk';
  
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
  
      $mail->Port = 587;
  
      $mail->setFrom($customer_E_mail);
  
      $mail->addAddress('finalprojectgp2022@gmail.com');
  
      $mail->isHTML(true);
  
      $verification_code = substr(number_format(time()*rand(),0,'',''),0,6);
  
      $mail->Subject = 'Order Placed';
      
      $html = '<html><head></head><body><div style="background-image: linear-gradient(45deg, #29323c, #485563); color: black; font-family: poppins; text-align:center;width:80%; border-radius: 10px; padding-bottom: 50px;"><h1 style="background:#393836;color:white; border-radius: 5px; padding: 5px;"> Order Information<div style="color:red;font-size:15px;">'.$date.'</div></h1>';
      $html .= '<h2 style="color:white; ">Name : '.$cname.'</h2>';
      $html .= '<h2 style="color:white; ">Contact : '.$Tel.'</h2>';
      $html .= '<h2 style="color:white; ">Address : '.$address.'</h2>';
      $html .= '<h2 style="color:white; ">Order Items :</h2>';
      $html .= '<h3 style="color:white; text-decoration: none; ">'.$pinfo."".'</h3>';
      $html .= '<h2 style="color:white; ">Total : '.$total.'</h2>';
      $html .= '</div> </body>';
  
      $mail->Body    =$html;
  
      $mail->send();
  
      $conn= mysqli_connect("localhost","root","","mr.kottu");
  
      mysqli_query($conn,$sql);
      
    }catch(Exception $e) {
      echo "Ordre Could not be Sent. Technical Error: {$mail->ErrorInfo}";
    }
  
    //mysqli_close($con);
    
        }
  else
  {
   // echo ("<script> alert('Ordre Place Unsuccessfully!');</script>");	
  }
    
?>

<?php

if (isset($_POST['check'])) {
  $uid=$user_id;
  $sql2="SELECT * FROM orders_info WHERE Order_ID='$oid'";
  $res2=mysqli_query($con,$sql2);
  $row = mysqli_fetch_array($res2);
  $umail = $row['E_mail'];
  $cnm = $row['Name'];
  $tot = $row['Total'];
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

    $mail->addAddress($umail);

    $mail->isHTML(true);

    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $mail->Subject = 'Order Conformation';

    $html = '<html><head></head><body><div style="color:white;background-image: linear-gradient(45deg, #29323c, #485563); text-align:center; padding: 30px; border-radius: 15px; font-family: poppins;"><h1 style=" "> Hi '.$cnm.' Your Order Confirmed</h1><br><h2 style="color:white;position:relative;">Your Total Amount Is: '.$tot.'<h2>';
  //  $html.='';
    $html .= '</div></body></html>';

    $mail->Body = $html;

    $mail->send();

    $conn = mysqli_connect("localhost", "root", "", "mr.kottu");

    mysqli_query($conn, $sql);
    exit();
  } catch (Exception $e) {
    echo "Message Could not be Sent. Mailer Error: {$mail->ErrorInfo}";
  }
}

	//mysqli_close($con);
?>

  <!-------------------------Mail Function End--------------------------------->

            </div>
        </div>
      </div>
    </main>


 <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022 Mr Kottu</p>
    <ul class="list-inline">
    <li class="list-inline-item"><a href="FAQ.php">FAQ</a></li>
      <li class="list-inline-item"><a href="policy.php">Privacy Policy</a></li>
      <li class="list-inline-item"><a href="term.php">Terms & Conditions</a></li>
      <li class="list-inline-item"><a href="customer_privacy.php">Customer Privacy</a></li>
    </ul>
  </footer>
</div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   <!-- Vendor JS Files -->
    <script src="assets_for_home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_for_home/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets_for_home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets_for_home/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets_for_home/vendor/php-email-form/validate.js"></script>

    <!-- Main JS File -->
    <script src="assets_for_home/js/main.js"></script>
            
    <script src="assets_for_home/js/jquery.min.js"></script>
    <script src="assets_for_home/js/popper.js"></script>
    <script src="assets_for_home/js/bootstrap.min.js"></script>
    <script src="assets_for_home/js/owl.carousel.min.js"></script>
    <script src="assets_for_home/js/menu.js"></script>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'alert.php'; ?>
	
  </body>
</html>