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
       $cart_count=mysqli_query($con,"SELECT * FROM cart WHERE Customer_ID='$user_id' ");
       $c_count=mysqli_num_rows($cart_count);
}
    else
    {
        $login_customer1='<i class="fas fa-id-badge"></i> Register';
        $login_customer2='<i class="fas fa-sign-in-alt"></i> Login';
        $c_count='0';
    }

}

else
{     
    $login_customer1='<i class="fas fa-id-badge"></i> Register';
    $login_customer2='<i class="fas fa-sign-in-alt"></i> Login';
    $c_count='0';
}


$status=mysqli_query($con,"SELECT * FROM resturent");
$status_fetch=mysqli_fetch_assoc($status);
$available=$status_fetch['status'];

if($available==0 )
{
    $warning_msg[] = 'Sorry Today Our Resturent Closed You Canot Buy Anything Only View Our Food Menu & Our Website We will Opean Our Restaurant Soon...';
    
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>Mr Kottu</title>
    <meta content="" name="description">
    <meta content="mrkottu,kottu, batticaloa, batti, cheese kottu, burger, noodles, " name="keywords">

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
    <link href="assets_for_home/css/banner.css" rel="stylesheet">
	
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
      
      <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
      
      <style>
      .review .review-slider{
    padding:1rem;
}

.review .review-slider .box{
    background:transperent;
    border-radius: .5rem;
    text-align: center;
    padding:3rem 2rem;
    outline-offset: -1rem;
    transition: .2s linear;
}

.review .review-slider .box:hover{
    outline-offset: 0rem;
}

.review .review-slider .box img{
    height:10rem;
    width:10rem;
    border-radius: 50%;
}

.review .review-slider .box p{
    padding:1rem 0;
    line-height: 1.8;
    color:#f5f5f5;
    font-size: 1.7rem;
}

.review .review-slider .box h3{
    padding-bottom: .5rem;
    color:#f5f5f5;
    font-size: 2.2rem;
}

.review .review-slider .box .stars i{
    color:#fd8203;
    font-size: 1.7rem;
}

      </style>
      
      

    
  </head>
  <body>

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
              <li><a href="#hero" class="nav-link active">Home</a></li>
              <li><a href="#about">About</a></li>
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
              <li><a href="#gallery">Gallery</a></li>
              <li><a href="#testimonials">Review</a></li>
			   <li><a href="#contact">Contact</a></li>
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
	
	<!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide 1 -->
                    <div class="carousel-item active" style="background-image: url(assets_for_home/img/slide/imgslide1-min.jpg);  ">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown"><span>DELICIOUS </span>COOKING</h2>
                                <p class="animate__animated animate__fadeInUp">There is no sincere love than the love of food.</p>
                                <div>
                                    <a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                    <a href="Customer_Register.php" class="btn-book animate__animated animate__fadeInUp scrollto">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background-image: url(assets_for_home/img/slide/imgslide2-min.jpg);  ">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Evening MOMENT</h2>
                                <p class="animate__animated animate__fadeInUp">A visit to our restaurant will prove one of the best experiences in your life.</p>
                                <div>
                                    <a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                    <a href="Customer_Register.php" class="btn-book animate__animated animate__fadeInUp scrollto">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3 -->
                    <div class="carousel-item" style="background-image: url(assets_for_home/img/slide/imgslide3-min.jpg);  ">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">AUTHENTIC KITCHEN</h2>
                                <p class="animate__animated animate__fadeInUp">Once you start, there is no way to stop you.

                                   You can’t live a full life on an empty stomach.
                                 </p>
                                <div>
                                    <a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                    <a href="Customer_Register.php" class="btn-book animate__animated animate__fadeInUp scrollto">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4 -->
                    <div class="carousel-item" style="background-image: url(assets_for_home/img/slide/imgslide4-min.jpg); ">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Outstanding Food</h2>
                                <p class="animate__animated animate__fadeInUp">People say you cannot buy happiness with money but
                                I say that you can buy some good food with money and
                                that is pretty much the same.
                                 </p>
                                <div>
                                    <a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto">Our Menu</a>
                                    <a href="Customer_Register.php" class="btn-book animate__animated animate__fadeInUp scrollto">Register Now</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
                </a>

            </div>
        </div>
    </section><!-- End Hero -->
      <br>
	
	 <!-- ======= About Section ======= -->
        
        <section id="about" class="about reveal"style=" background:url(assets_for_home/img/Index_IMG/about-min.jpg) no-repeat; box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
            <div class="container-fluid " >
                        <div class="content">
                            <div class="section-title">
                            <h3><strong>
                                      <h2 class="text-light"> Welcome To <span><?php echo $status_fetch['resturent_Name']; ?></span></h2></strong></h3>
                                </div>
                            <center><img src="updated_photo/<?php echo $status_fetch['photo']; ?>" alt="logo icon" style="border-radius:50%;" width="200" height="200"></center>
                       <br>
                            <h4 class="text-center text-light">
                                " Life Is a Combination Of Magic And Kottu "<br>
                                come with zero expectations<br>you will get suprised with our food taste
                            </h4> 
                           <center><a href="About_mrkottu.html" target="_blank" class="btn-menu animate__animated animate__fadeInUp scrollto">Read More</a></center> 
                        </div>
                    </div>
        </section><!-- End About Section -->
		
		        <div class="container-fluid shadow-lg reveal">
                        <?php
                        
                        $orders_count=mysqli_query($con,"SELECT * FROM order_details WHERE status='1' ");
                        $order=mysqli_num_rows( $orders_count);
                        
                        $delivery_count=mysqli_query($con,"SELECT * FROM delivery");
                        $delivery_status=mysqli_num_rows( $delivery_count);

                        $customer_count=mysqli_query($con,"SELECT * FROM customer");
                        $customer_status=mysqli_num_rows($customer_count);
                        
                        $delivery_total=mysqli_query($con,"SELECT SUM(Total) AS Total_Income FROM delivery ");
                        $Total=mysqli_fetch_assoc($delivery_total);
                        $sum= $Total['Total_Income'];
                        
                        ?>
                        <br>
                         <div class="section-title animate__animated animate__fadeInUp scrollto">
                              <h2>Our <span>Status</span></h2>
                         </div>
        <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row counter-wrapper">
                                    <div class="col-md-4 col-4">
                                        <div class="card-body text-center">
                                            <h4 class="counter"><b><?php echo "$order"; ?></b></h4>
                                            <span style="color:#ffb03b;"><b>Food Orders</b></span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-4">
                                        <div class="card-body text-center">
                                            <h4 class="counter"><i class="fas fa-utensils"></i>  <b><?php echo "$delivery_status"; ?></b></h4>
                                            <span style="color:#ffb03b;"><b>Food Delivered</b></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4 col-4">
                                        <div class="card-body text-center">
                                            <h4 class="counter"><i class="fas fa-users"></i> <b><?php echo "$customer_status"; ?></b></h4>
                                            <span style="color:#ffb03b;"><b> Happy Customers</b></span>
                                        </div>
                                    </div>
                                </div>    
                            </div>
                        </div>
                    </div>
                </div>
        </div>
		
		<!-- ======= Whu Us Section ======= -->
        <section id="why-us" class="why-us reveal">
            <div class="container">

                <div class="section-title">
                    <h2>Features Of <br><span>Our Restaurant</span></h2>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="box text-center">
                            <span>01</span>
                            <h4>Quality Foods</h4>
                            <img src="assets_for_home/img/Index_IMG/step-1-min.jpg">
                            <p>A visit to our restaurant will prove one of the best experiences in your life.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box text-center">
                            <span>02</span>
                            <h4>Fast Delivery</h4>
                             <img src="assets_for_home/img/Index_IMG/step-2-min.jpg">
                            <p>Want a delicious meal ,but no time we will deliver it hot and yummy</p>
                        </div>
                    </div>

                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="box text-center">
                            <span>03</span>
                            <h4>Easy Payment Methods</h4>
                            <img src="assets_for_home/img/Index_IMG/step-3-min.jpg">
                            <br>
                            <p>Deal the payments with no stress and insecurity</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- End Whu Us Section -->
      
      
       <!-- ======= Menu Section ======= -->
		 
		 <?php
		  
        echo'<section id="ftco-section" class="ftco-section reveal">
            <div class="section-title">
                    <h2>New <span>Arrivals</span></h2>
                </div>
                <div class="container">
				<div class="row">';
				
				 $select_menu=mysqli_query($con,"SELECT * FROM products WHERE Type='Specialty' AND status='1' order by `DATE` DESC ");
                    if(mysqli_num_rows($select_menu)>0)
                    {
					
					echo '<div class="col">
						<div class="featured-carousel owl-carousel">';
						
						 while($special_fetch=mysqli_fetch_assoc($select_menu))
                              { 
								 $special_name=$special_fetch['Product_Name'];
								 $special_price=$special_fetch['Price'];

								 ?>
								
							<div class="item">
								<div class="work">
									<div >
                                        <img class="img d-flex align-items-center justify-content-center rounded" src="updated_photo/<?php echo $special_fetch['image']; ?>" alt="Special_menu" >
									</div>
									<div class="text pt-3 w-100 text-center">
										<h3><a href="#"><b><?php echo $special_name; ?></b></a></h3>
										<h3><a href="#"><b>Price : Rs <?php echo  $special_price; ?></b></a></h3>
									</div>
								</div>
								 
							</div>
							 <?php } }	
                                    else
									   {
											echo '<center><h3 class="text-center text-warning">No New Menus Available !</h3></center>';
									   } ?>
						</div>
					</div>
				</div>
				<center><br><a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto" style="font-size:20px; font-weight:200px; ">View More</a></center>
			</div>
		</section>


		
		 <!-- ======= Menu Section ======= -->
		 
		 <?php
		  
        echo'<section id="ftco-section" class="ftco-section reveal">
            <div class="section-title">
                    <h2>Our Trending <span>Menu</span></h2>
                </div>
                <div class="container">
				<div class="row">';
				
				 $select_menu=mysqli_query($con,"SELECT * FROM special_menu order by `ID` DESC ");
                    if(mysqli_num_rows($select_menu)>0)
                    {
					
					echo '<div class="col">
						<div class="featured-carousel owl-carousel">';
						
						 while($special_fetch=mysqli_fetch_assoc($select_menu))
                              { 
                                 $id=$special_fetch['ID'];
								 $special_name=$special_fetch['Name'];
								 $special_price=$special_fetch['price'];
								 
								 
								 ?>
								
							<div class="item">
								<div class="work">
									<div >
                                        <img class="img d-flex align-items-center justify-content-center rounded" src="updated_photo/<?php echo $special_fetch['photo']; ?>" alt="Special_menu" >
									</div>
									<div class="text pt-3 w-100 text-center">
										<h3><a href="#"><b><?php echo $special_fetch['Name']; ?></b></a></h3>
										<h3><a href="#"><b>Price : Rs <?php echo $special_fetch['price']; ?></b></a></h3>
										<input type="hidden" name="name" value="<?php echo $special_name; ?>">
										<input type="hidden" name="price" value="<?php echo $special_price; ?>">
										<input type="hidden" name="image" value="<?php echo $special_fetch['photo']; ?>">
									</div>
								</div>
								 
							</div>
							 <?php } }	
                                    else
									   {
											echo '<center><h3 class="text-center text-warning">No Trending Foods Available Now !</h3></center>';
									   } ?>
						</div>
					</div>
				</div>
				<center><br><a href="foodmenu.php" class="btn-menu animate__animated animate__fadeInUp scrollto" style="font-size:20px; font-weight:200px; ">View More</a></center>
			</div>
		</section>
		
        <!-- ======= Gallery Section ======= -->
        <section id="gallery" class="gallery reveal">
            <div class="container-fluid" style=" box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">

                <div class="section-title">
				<br>
                    <h2>Our <span>Food Galary</span></h2>
                </div>

                <div class="row g-0">
                <?php 
                    
                    $galary=mysqli_query($con,"SELECT * FROM gallery ORDER BY Date DESC LIMIT 8");
                    if(mysqli_num_rows($galary)>0)
                    {
                        while($galary_fetch=mysqli_fetch_assoc($galary))
                        {
                            $g_name=$galary_fetch['Name'];
                            
                            ?>

                <div class="col-md-3">
                        <div class="gallery-item">
                            <a href="<?php echo $g_name; ?>" class="gallery-lightbox">
                                <div class="card border-0" ><div class="card-body">
                                <center><img src="<?php echo $g_name; ?>" alt="gallery" class="card-img-top" style="width:400px; height:400px; ">
                                </div></div></center>
                            </a>
                        </div>
                    </div>
                       
                    
                    <?php }}?>
  
                </div>
               <br><center> <a href="food_gallery.php" class="btn-menu animate__animated animate__fadeInUp scrollto" style="font-size:20px; font-weight:200px; ">View More</a> </center><br>
            </div>
        </section><!-- End Gallery Section -->
<br>
		
	     <!-- ======= Testimonials Section ======= -->
         
<div class="section-title">
                    <h2><span>Customer</span> Reviews</h2>
                </div>
<section class="review" id="review" style="background-image: url(assets_for_home/img/Index_IMG/shopbg-min.jpg);  ">


    <div class="swiper review-slider">

        <div class="swiper-wrapper">
            <?php
               $select="select * from review ORDER BY Date DESC ";
                        $review_query=mysqli_query($con,$select);
                            
                            if(mysqli_num_rows($review_query)>0)
                            {
                                
                              while($row1=mysqli_fetch_array($review_query))
                        {
                            $R_name=$row1['Name'];
                            $R_photo=$row1['image'];
                            $Subject=$row1['Subject'];
                            $Message=$row1['Message'];
                            $Rating=$row1['Rating'];
                                
                                if($Rating==1)
                                {
                                  $star='<i class="bi bi-star-fill"></i>';
                                }
                                else if($Rating==2)
                                {
                                  $star='<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                                }
                                else if($Rating==3)
                                {
                                  $star='<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                                }
                                else if($Rating==4)
                                {
                                  $star='<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                                }
                                else
                                {
                                    $star='<i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>';
                                }
                                  
                              ?>
            <div class="swiper-slide box">
                <img src="updated_photo/<?php echo $R_photo; ?>" alt="review">
                <p> <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                   <b><?php echo $Message; ?></b> 
                                    <i class="bx bxs-quote-alt-right quote-icon-right"></i></p>
                <h3><b><?php echo $R_name; ?></b></h3>
                <div class="stars">
                   <?php echo $star; ?>
                </div>
            </div>
            
             <?php } }	 ?>

           

           
         

        </div>

    </div>

</section>

<!-- review section ends -->
		
		<!-- ======= Contact Section ======= -->
        <section id="contact" class="contact reveal">
            <div class="container">

                <div class="section-title">
                    <h2><span>Contact</span> Us</h2>
                </div>
            </div>

            <div class="container mt-5">

                <div class="info-wrap">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 info">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p><?php echo $status_fetch['address']; ?></p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-clock"></i>
                            <h4>Open Hours:</h4>
                            <p><?php echo $status_fetch['open_to']; ?>-<?php echo $status_fetch['close_from']; ?>:<br><?php echo $status_fetch['open_hour_am']; ?> PM - <?php echo $status_fetch['closed_hour_pm']; ?> PM</p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-envelope"></i>
                            <h4>Email:</h4>
                            <p><?php echo $status_fetch['Email']; ?></p>
                        </div>

                        <div class="col-lg-3 col-md-6 info mt-4 mt-lg-0">
                            <i class="bi bi-phone"></i>
                            <h4>Call:</h4>
                            <p><?php echo $status_fetch['phone_No']; ?></p>
                        </div>
                    </div>
                </div>

         <form method="post" role="form" action="message_mail.php" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit" name="sendmessage">Send Message <i class="fas fa-paper-plane"></i></button></div>
                </form>
            </div>
        </section><!-- End Contact Section -->
		
		<!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <h4>Shop</h4>
                    <ul>
                        <li><a href="#about">About Us</a></li>
                        <li><a href="#why-us">Our Services</a></li>
                        <li><a href="policy.php">Privacy policy</a></li>
                        <li><a href="customer_privacy.php">Customer privacy</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Get Help</h4>
                    <ul>
                        <li><a href="FAQ.php">FAQ</a></li>
                        <li><a href="term.php">TERMS & CONDITIONS</a></li>
                        <li><a href="Customer_Dashboard.php">Order Status</a></li>
                        <li><a href="app-final-apk-63e60433c1383-1676018739.apk">Download Android Apk</a></li>
                        
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Online Shop</h4>
                    <ul>
                        <li><a href="kottu.php">Kottu</a></li>
                        <li><a href="Cheesekottu.php">Cheese Kottu</a></li>
                        <li><a href="Noodles.php">Noodles</a></li>
                        <li><a href="Barrota.php">Barotta</a></li>
                        <li><a href="Specially.php">Specialty</a></li>
                    </ul>
                </div>
                
                <div class="footer-col">
                    <h4>Follow Us</h4>
                    <div class="social-links">
                        <a href="https://www.facebook.com/mrkottulk" class="fab fa-facebook-f"></a>
                       <a href="#" class="fab fa-twitter"></a>
                       <a href="#" class="fab fa-instagram"></a>
                           <a href="#" class="fab fa-linkedin"></a>
                    </div>
                   <br>
                </div>
            </div>
            <div class="row">
            <div class=col-12>
                <div class="card">
                <div class="card-body">
                    <a href="developer.php"><h3 class="card-title text-center"><b>Developed By Developer Kids</b></h3></a>
<img src="assets_for_home/img/About_Page/vta-min.png" height="80" width="140" align="left"><P class="card-text"><a href="http://www.vtasl.gov.lk/" style="color:#9d1d40;">National Vocational Training Institute-vantharumoolai VTA-Batticaloa</a><br><a href="https://goo.gl/maps/TtJ5Pj7TqCwMsQQK8" target="_blank" style="color:#9d1d40;"><i class="bi bi-geo-alt"></i> APC Rd, Thavapuram, vantharumoolai <br><i class="bi bi-phone"></i> 0652 240 159<br></p></a></div></div></div>
        </div>
        </div>
    </footer> <!-- End Footer -->

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

<script>
var swiper = new Swiper(".review-slider", {
    loop:true,
    spaceBetween: 20,
    autoplay: {
        delay: 7500,
        disableOnInteraction: false,
    },
    centeredSlides: true,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 2,
      },
      1020: {
        slidesPerView: 3,
      },
    },
});


</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<?php include 'alert.php'; ?>
	
  </body>
</html>