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
       $login_customer1='<i class="fas fa-id-badge"></i> Account';
       $login_customer2='<i class="fas fa-sign-out-alt"></i>Logout';
}
    else
    {
        $login_customer1='<i class="fas fa-id-badge"></i> Register';
         $login_customer2='<i class="fas fa-sign-in-alt"></i> Login';
    }

}

else
{     
       $login_customer1='<i class="fas fa-id-badge"></i> Register';
         $login_customer2='<i class="fas fa-sign-in-alt"></i> Login';
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

?>

<?php

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];

   $update_quantity_query = mysqli_query($con, "UPDATE `cart` SET Qty = '$update_value' WHERE ID  = '$update_id'");

   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($con, "DELETE FROM `cart` WHERE ID  = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($con, "DELETE FROM `cart` WHERE Customer_ID='$user_id' ");
   header('location:cart.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Cart</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
	<link href="assets_for_home/css/Category.css" rel="stylesheet">
    
	<link href="assets_for_home/css/mystyle.css" rel="stylesheet">
	
	<link rel="stylesheet" href="assets_for_home/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets_for_home/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="assets_for_home/css/menu.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	
	<!-- Vendor CSS Files -->
    <link href="assets_for_home/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets_for_home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets_for_home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets_for_home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets_for_home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>

.qty{
   border: .1rem solid rgba(0,0,0,.3);
   border-radius: .5rem;
   padding:.5rem 1rem;
   width:6.5rem;
   font-size: 1.5rem;
   color: #2c3e50;
}
        
.btn,btn1,
.delete-btn{
   display: block;
   text-align: center;
   width: 100%;
   margin-top: 1rem;
   padding: 1rem 2rem;
   color: #fff;
   cursor: pointer;
   font-size: 1.2rem;
   text-transform: capitalize;
   border-radius: .5rem;
}

.btn{
   background-color:#2980b9;
}
        
.btn1{
   background-color:#fd8203;
}

.delete-btn{
   background-color:#ff3838;
}

.btn:hover,
.delete-btn:hover{
   opacity: 80%;
   color:#fff;
}

</style>
</head>
<body style="background-color:#f5f5f5;">
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->

    <!-- NAVBAR -->
    <header id="header" class="site-navbar mt-3 d-flex align-items-center header-transparent bg-dark" >
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


    <br><br><br><br>
<div class="container" style="font-size:18px;">

<section class="shopping-cart">

   <h1 class="text-center bold"><b>shopping cart</b></h1><br>
    <center>
   <table class="table table-responsive row col-lg-12">

      <thead>
         <th>image</th>
         <th>name</th>
         <th>price</th>
         <th>quantity</th>
         <th>total price</th>
         <th>action</th>
      </thead>

      <tbody>

         <?php 
         
         $select_cart =mysqli_query($con, "SELECT * FROM `cart` WHERE Customer_ID='$user_id' ");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
               $status=$fetch_cart['status'];
               $Food=$fetch_cart['Name'];
               $Food_qty=$fetch_cart['Qty'];
              

               if($status=='0')
               {
                  $Message="<span class='text-danger'><b>This Food Not Available Right Now ! </b></span>";
                  $P_Price=0;
                  $update_buttun='<input type="submit" value="update" name="update_update_btn" class="btn" disabled>';
                  
               }
               else
               {
                  $Message="";
                  $update_buttun='<input type="submit" value="update" name="update_update_btn" class="btn">';
                  $P_Price=$fetch_cart['Price'];
               }

         ?>

         <tr>
         <form action="" method="post">
            <td><img src="updated_photo/<?php echo $fetch_cart['Image']; ?>" height="200" width="250" alt=""></td>
            <td><?php echo  $Food; ?> <br> <?php echo $Message; ?></td>
            <td >Rs<?php echo $P_Price; ?>/-</td>
            <td>
              
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['ID']; ?>">
                  <input type="number" name="update_quantity"  min="1"   max="10" class="qty" value="<?php echo $Food_qty; ?>" >
                  <?php echo  $update_buttun; ?>
               </form>   
            </td>
            <td>Rs<?php echo $sub_total = ($P_Price * $Food_qty); ?>/-</td>
            <!-- Multiply the Amount into Price-->
            <td><a href="cart.php?remove=<?php echo $fetch_cart['ID']; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
         </tr>
         <?php
           $grand_total += $sub_total;  
            };
         }
          else
          {
              echo "<h3 class='text-center'>Your Cart IS Empty... <a href='foodmenu.php'>Go To Shopping</a></h3>";
          }
         ?>
         <tr class="table-bottom">
            <td><a href="foodmenu.php" class="option-btn" style="margin-top: 0;">continue shopping</a></td>
            <td colspan="3" class="text-center">grand total</td>
            <td>Rs<?php echo $grand_total; ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
         </tr>

      </tbody>

   </table>

   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>
    </center>

</section>

</div>
   
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy;2022  Mr Kottu</p>
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
	
  </body>
</html>