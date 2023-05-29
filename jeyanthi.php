<?php

include 'connection.php';

$select=mysqli_query($con,"SELECT * FROM profile WHERE Profile_ID='0016' ");
$row=mysqli_fetch_assoc($select);

         $Name=$row['Name'];
         $Address=$row['Address'];
         $TP_NO=$row['TP_NO'];
         $DOB=$row['DOB'];
         $AGE=$row['AGE'];
         $status=$row['status'];
        $Nationality=$row['Nationality'];
        $Postcode=$row['Postcode'];
         $Qualification=$row['Qualification'];
         $skill=$row['skill'];
        $Language=$row['Language'];
         $Experience=$row['Experience'];
         $Experince_info=$row['Experince_info'];
         $Porject=$row['Porject'];
         $Awards=$row['Awards'];
         $Education=$row['Education'];
         $MAIL=$row['MAIL'];
         $Profile_IMG=$row['Profile_IMG'];
         $ABOUT=$row['ABOUT'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Name; ?></title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    
     <!-- Favicons -->
    <link href="assets_for_home/img/IMG-20230211-WA0016.jpg" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="vebeshan.css">

</head>
<body>
    
<!-- header section starts  -->

<header>

    <div class="user">
        <img src="updated_photo/<?php echo $Profile_IMG; ?>" alt="Profile_IMG">
        <h3 class="name"> <?php echo $Name; ?> </h3>
        <p class="post"><?php echo $skill; ?></p>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="#home">home</a></li>
            <li><a href="#about">about</a></li>
            <li><a href="#education">education</a></li>
            <li><a href="#portfolio">Experience</a></li>
            <li><a href="#contact">contact</a></li>
        </ul>
    </nav>

</header>

<!-- header section ends -->

<div id="menu" class="fas fa-bars"></div>

<!-- home section starts  -->

<section class="home" id="home">

    <h3>HI THERE !</h3>
    <h1>I'M <span><?php echo $Name; ?></span></h1>
    <p><?php echo $ABOUT; ?>
    </p>
    <a href="#about"><button class="btn">about me <i class="fas fa-user"></i></button></a>

</section>

<!-- home section ends -->

<!-- about section starts  -->

<section class="about" id="about">

<h1 class="heading"> <span>about</span> me </h1>

<div class="row">

    <div class="info">
        <h3> <span> name : </span> <?php echo $Name; ?> </h3>
        <h3> <span> age : </span> <?php echo $AGE; ?> </h3>
        <h3> <span> qualification : </span> <?php echo $Qualification; ?> </h3>
        <h3> <span> post : </span> <?php echo $skill; ?> </h3>
        <h3> <span> Nationality : </span> <?php echo $Nationality; ?> </h3>
        <a href=""><button class="btn"> download CV <i class="fas fa-download"></i> </button></a>
    </div>

    <div class="counter">

        <div class="box">
            <span><?php echo $Experience; ?>+</span>
            <h3>years of experience</h3>
        </div>

        <div class="box">
            <span><?php echo $Porject; ?>+</span>
            <h3>porject completed</h3>
        </div>

        <div class="box">
            <span>430+</span>
            <h3>happy clients</h3>
        </div>

        <div class="box">
            <span><?php echo $Awards; ?>+</span>
            <h3>awards won</h3>
        </div>

    </div>

</div>

</section>

<!-- about section ends -->

<!-- education section starts  -->

<section class="education" id="education">

<h1 class="heading"><i class="fas fa-graduation-cap"></i> my <span>education</span> </h1>

<div class="box-container">

    <div class="home">
        
        <p><?php echo $Education;?></p>
    </div>
    
           
        

</div>

</section>

<!-- education section ends -->

<!-- portfolio section starts  -->

<section class="education" id="portfolio">

<h1 class="heading"> my <span>Experience</span> </h1>

<div class="box-container">

    <div class="box">
        <i class="fas fa-graduation-cap"></i>
        <p> <span><?php echo $Experince_info;?></span></p>
    </div>

</div>

</section>

<!-- portfolio section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">

<h1 class="heading"> <span>contact</span> me </h1>

<div class="row">

    <div class="content">

        <h3 class="title">contact info</h3>

        <div class="info">
            <h3><i class="fas fa-envelope"></i> <?php echo $MAIL; ?></h3>
            <h3><i class="fas fa-phone"></i> <?php echo $TP_NO; ?> </h3>
            <h3><i class="fas fa-map-marker-alt"></i><?php echo $Address; ?> </h3>
            
        </div>

    </div>
</div>

</section>

<!-- contact section ends -->


<!-- scroll top button  -->

<a href="#home" class="top">
    <img src="images/scroll-top-img.png" alt="">
</a>

<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- custom js file link  -->
<script src="vebeshan.js"></script>


</body>
</html>