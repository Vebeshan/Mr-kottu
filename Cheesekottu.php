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

@include 'connection.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_quantity =$_POST['qty'];
   $product_image = $_POST['product_image'];

   $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE Name = '$product_name' AND Customer_ID='$user_id' ");

   if(mysqli_num_rows($select_cart) > 0)
   {
     $error_msg[]= 'This Food Already Added To Your Cart !!!';
   } 

   else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(ID,Name, Price, Qty,Image,status,Customer_ID) VALUES('','$product_name', '$product_price', '$product_quantity','$product_image','1','$user_id')");

      if($insert_product)
      {
          $success_msg[]="Food Added To Your Cart";
        
      }
      else
      {
         $warning_msg[] = 'Something went wrong!';
      }
   }
}

?>

<?php
@include 'connection.php';
$cart_count=mysqli_query($con,"SELECT * FROM cart WHERE Customer_ID='$user_id' ");
$c_count=mysqli_num_rows($cart_count);

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Cheesekottu</title>
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
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <style>

.product-form{
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: calc(100vh - 15rem);
}

.product-form form{
   border: .1rem solid rgba(0,0,0,.3);
   border-radius: .5rem;
   padding: 2rem;
   width: 50rem;
   background-color:#fff;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
}

.product-form form h3{
   padding-bottom: 1rem;
   font-size: 2.5rem;
   color: #2c3e50;
   text-transform: capitalize;
   text-align: center;
}

.product-form form p{
   padding-top: 1rem;
   font-size: 1.7rem;
   color: #666;
}

.product-form form p span{
   color: red;
}

.product-form form .box{
   width: 100%;
   border-radius: .5rem;
   background-color: #eee;
   margin: 1rem 0;
   font-size: 1.8rem;
   color: black;
   padding: 1.4rem;
}
.products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 35rem);
   align-items: flex-start;
   justify-content: center;
   gap: 1.5rem;
}

.products .box-container .box{
   border: .1rem solid rgba(0,0,0,.3);
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
   background-color: #fff;
   padding: 2rem;
   border-radius: .5rem;
}

.products .box-container .box .image{
   height: 20rem;
   width: 100%;
   object-fit: contain;
   margin-bottom:2rem;
}

.products .box-container .box .name{
   font-size: 2rem;
   color: #2c3e50;
}

.products .box-container .box .flex{
   padding-bottom: 1rem;
   display: flex;
   gap: 1rem;
   align-items: flex-end;
}

.products .box-container .box .price{
   font-size: 1.7rem;
   color:#e74c3c;
   margin-right: auto;
}  

.products .box-container .box .flex .qty{
   border: .1rem solid rgba(0,0,0,.3);
   border-radius: .5rem;
   padding:.5rem 1rem;
   width:6.5rem;
   font-size: 1.8rem;
   color: #2c3e50;
}

.products .box-container .box .flex .fa-edit{
   background-color: #f39c12;
   border-radius: .5rem;
   font-size: 1.7rem;
   color: #fff;
   height: 3.5rem;
   width: 4.5rem;
   cursor:no-drop;
}

.products .box-container .box .flex .fa-edit:hover{
   background-color: #2c3e50;
}

.products .box-container .box .sub-total{
   padding-bottom: 1rem;
   font-size: 1.7rem;
   color: #666;
}

.products .box-container .box .sub-total span{
   color:#e74c3c;
}

.products .cart-total{
   max-width: 40rem;
   margin: 0 auto;
   background-color: #fff;
   margin-top: 2rem;
   border-radius: .5rem;
   border: .1rem solid rgba(0,0,0,.3);
   padding: 2rem;
   box-shadow: 0 .5rem 1rem rgba(0,0,0,.1);
}

.products .cart-total p{
   padding-bottom: 1rem;
   font-size: 2rem;
   color: #666;
}

.products .cart-total p span{
   color: #e74c3c;
}
.btn,
.delete-btn{
   display: block;
   text-align: center;
   width: 100%;
   margin-top: 1rem;
   padding: 1rem 3rem;
   color: #fff;
   cursor: pointer;
   font-size: 1.8rem;
   text-transform: capitalize;
   border-radius: .5rem;
}

.btn{
   background-color:#2980b9;
}

.delete-btn{
   background-color:   #28a745;
}

.btn:hover,
.delete-btn:hover{
   opacity: 80%;
   color:#fff;
}

/*--------------------------------------------------------------
# Menu Section
--------------------------------------------------------------*/
.menu #menu-flters {
  padding: 0;
  margin: 0 auto 0 auto;
  list-style: none;
  text-align: center;
  border-radius: 50px;
}

.menu #menu-flters li {
  cursor: pointer;
  display: inline-block;
  padding: 8px 16px 10px 16px;
  font-size: 14px;
  font-weight: 500;
  line-height: 1;
  color: #444444;
  margin: 0 3px 10px 3px;
  transition: all ease-in-out 0.3s;
  background: #fff;
  border: 2px solid #ffb03b;
  border-radius: 50px;
}

.menu #menu-flters li:hover,
.menu #menu-flters li.filter-active {
  color: #fff;
  background: #ffb03b;
}

.menu #menu-flters li:last-child {
  margin-right: 0;
}

.menu .menu-content {
  margin-top: 30px;
  overflow: hidden;
  display: flex;
  justify-content: space-between;
  position: relative;
}

.menu .menu-content::after {
  content: "......................................................................""....................................................................""....................................................................";
  position: absolute;
  left: 20px;
  right: 0;
  top: -4px;
  z-index: 1;
  color: #dad8d4;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}

.menu .menu-content a {
  padding-right: 10px;
  background: #fff;
  position: relative;
  z-index: 3;
  font-weight: 700;
  color: #ff9b08;
}

.menu .menu-content span {
  background: #fff;
  position: relative;
  z-index: 3;
  padding: 0 10px;
  font-weight: 600;
}

.menu .menu-ingredients {
  font-style: italic;
  font-size: 14px;
  font-family: "Comic Neue", sans-serif;
  color: #948c81;
}

@media (max-width:450px){


   .products .box-container{
      grid-template-columns: 1fr;
   }

   .orders .box-container{
      grid-template-columns: 1fr;
   }

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

    <section id="menu" class="menu">
      <div class="container-fluid">

<div class="container">

        <div class="section-title">
            <h2>Check our tasty <span>Menu</span></h2>
        </div>
          
        <center> <form method="post" action="food_search.php">
    <input type="text" placeholder="Search Here..." id="search-box" name="mysearch" required style="padding:10px 15px;"> 
             <input type="submit" value="search" name="search" style="padding:10px 15px; background-color: #f39c12;">
          </form></center>
           </div>
        <br>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">
                <a href="foodmenu.php"><li >Show All</li></a>
              <a href="kottu.php"><li>Kottu</li></a>
              <a href="Cheesekottu.php"><li class="filter-active">Cheese Kottu</li></a>
              <a href="Barrota.php"><li>Barotta</li></a>
              <a href="Noodles.php"><li>Noodles</li></a>
              <a href="Bites.php"><li >Bites</li></a>
              <a href="Specially.php"><li>Specialty</li></a>
            </ul>
          </div>
        </div>

    <section class="products">
   <div class="box-container">

   <?php 
      include 'connection.php';
      $select_products = mysqli_query($con,"SELECT * FROM products WHERE Type='Cheese Kottu' ORDER BY(DATE) DESC");
       
      if(mysqli_num_rows($select_products)>0)
      {
         while($fetch_prodcut=mysqli_fetch_assoc($select_products))
         {
             
             $name=$fetch_prodcut['Product_Name'];
             $price=$fetch_prodcut['Price'];

          if($fetch_prodcut['status']==1)
          {
            $status="<span class='text-success display-6'>Available</span>";
            $p_qty='<input type="number" name="qty" required min="1" value="1" max="10" maxlength="2" class="qty">';
            $button='<input type="submit" class="btn" value="add to cart" name="add_to_cart">';
          }
          else
          {
            $status="<span class='text-danger display-6'>Not Available</span>";
            $p_qty='<input type="number" name="qty" required min="1" value="1" max="10" maxlength="2" class="qty" disabled >';
            $button='<input type="submit" class="btn btn-danger" value="add to cart" name="add_to_cart" disabled>';
          }
   ?>
   
         <div class="box">
             <span><?php echo $status; ?></span>
            <img src="updated_photo/<?php echo $fetch_prodcut['image']; ?>" class="image" alt="">
            <h3><?php echo $fetch_prodcut['Product_Name']; ?></h3>
      <div class="flex">
         <p class="price">Rs <?= $fetch_prodcut['Price'] ?></p>
         <form method="post" enctype="multipart/form-data">
         <?php echo  $p_qty; ?>
      </div>
      
            <input type="hidden" name="product_name" value="<?php echo $name; ?>">
            <input type="hidden" name="product_price" value="<?php echo $price; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_prodcut['image']; ?>">
            <?php echo  $button; ?>
         </div>
      </form>

      <?php
         };
      }
       else
       {
            echo '<h1 class="empty text-center text-warning">No Foods Found !</h1>';
       }
      ?>

   </div>
</section>
<footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2021-2022  Mr Kottu</p>
    <ul class="list-inline">
    <li class="list-inline-item"><a href="FAQ.php">FAQ</a></li>
      <li class="list-inline-item"><a href="policy.php">Privacy Policy</a></li>
      <li class="list-inline-item"><a href="term.php">Terms & Conditions</a></li>
      <li class="list-inline-item"><a href="customer_privacy.php">Customer Privacy</a></li>
    </ul>
  </footer>


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
        </div>
    </section>
</body>
</html>


     
      
      
 



     