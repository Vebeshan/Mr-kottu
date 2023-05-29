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

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title>PRIVACY POLICY</title>
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
      
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
      
      <style>
      
      .wrapper{
    background-color: #ffffff;
    margin-bottom: 20px;
    padding: 15px 40px;
    border-radius: 5px;
    box-shadow: 0 15px 25px rgba(0,0,50,0.2);
}
.toggle,
.content{
    font-family: "Poppins",sans-serif;
}
.toggle{
    width: 100%;
    background-color: transparent;
    display: flex;
    align-items: center;
    justify-content: space-between;
    font-size: 16px;
    color: #111130;
    font-weight: 500;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 15px 0;
    font-size: 25px;
}
.content{
    position: relative;
    font-size: 20px;
    text-align: justify;
    line-height: 30px;
    height: 0;
    overflow: hidden;
    transition: all 1s;
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


      <div class="container">
          <div class="section-title">
                    <h2><span><b>PRIVACY POLICY</b></span></h2>
                </div>
          
          <?php
          
          $policy=mysqli_query($con,"SELECT Policy FROM home_page");
          $policy_fetch=mysqli_fetch_array($policy);
          ?> 
       <P style="font-size:18px;">
<?php echo $policy_fetch['Policy']; ?>
</P>
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2022  Mr Kottu</p>
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
        
        <script>
        let toggles = document.getElementsByClassName('toggle');
let contentDiv = document.getElementsByClassName('content');
let icons = document.getElementsByClassName('icon');

for(let i=0; i<toggles.length; i++){
    toggles[i].addEventListener('click', ()=>{
        if( parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight){
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            toggles[i].style.color = "#0084e9";
            icons[i].classList.remove('fa-plus');
            icons[i].classList.add('fa-minus');
        }
        else{
            contentDiv[i].style.height = "0px";
            toggles[i].style.color = "#111130";
            icons[i].classList.remove('fa-minus');
            icons[i].classList.add('fa-plus');
        }

        for(let j=0; j<contentDiv.length; j++){
            if(j!==i){
                contentDiv[j].style.height = "0px";
                toggles[j].style.color = "#111130";
                icons[j].classList.remove('fa-minus');
                icons[j].classList.add('fa-plus');
            }
        }
    });
}
        
        
        </script>

<?php include 'alert.php'; ?>
        </div>
    </section>
</body>
</html>