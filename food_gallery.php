<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Our Food Galary</title>

   <!-- Favicons -->
   <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

:root{
   --crimson:crimson;
   --black:#333;
   --white:#fff;
   --light-black:#666;
   --light-bg:#eee;
   --dark-bg:rgba(0,0,0,.7);
   --border:1px solid #999;
   --box-shadow:0 5px 10px rgba(0,0,0,.1);
}

*{
   font-family: 'Poppins', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   outline: none; border:none;
   text-decoration: none;
   transition: all .2s linear;
}

body{
   background-color: var(--light-bg);
}

::-webkit-scrollbar{
   width: 10px;
}

::-webkit-scrollbar-track{
   background-color: transparent;
}

::-webkit-scrollbar-thumb{
   background-color: #ffb03b;
   border-radius: 5rem;
}

.heading{
   margin-bottom: 20px;
   font-size: 30px;
   color:var(--black);
   text-transform: uppercase;
   text-align: center;
}

.btn{
   margin-top: 10px;
   display: inline-block;
   padding:10px 30px;
   cursor: pointer;
   font-size: 17px;
   background-color: var(--light-bg);
   color:var(--black);
   text-transform: capitalize;
   text-align: center;
   border-radius:18px;
}

.btn:hover{
   background-color:#ffb03b;
   color:var(--white);
}

.gallery{
   padding:20px;
   text-align: center;
   padding-left: 320px;
}

.gallery .image-container{
   gap:15px;
   columns:3 350px;
}

.gallery .image-container img{
   break-inside: avoid;
   width: 100%;
   background-color: var(--light-bg);
   object-fit: cover;
   cursor: pointer;
   margin-bottom: 10px;
   box-shadow: var(--box-shadow);
}

.gallery .image-container img:hover{
   transform: scale(.95);
}

.side-bar{
   height: 100vh;
   width: 300px;
   position: fixed;
   top:0; left:0;
   z-index: 1000;
   background-color: var(--white);
   padding:20px;
   border-right: var(--border);
   overflow-y: scroll;
}

.side-bar::-webkit-scrollbar{
   width: 5px;
}

.side-bar .box{
   border-bottom: var(--border);
   padding:20px 0;
}

.side-bar .box .title{
   margin-bottom: 10px;
   color:var(--black);
   font-size: 20px;
   text-transform: uppercase;
}

.side-bar .btn{
   margin-left: 5px;
}

.side-bar .btn.active{
   background-color:#ffb03b;
   color:var(--white);
}

.side-bar .box #search-box{
   border:var(--border);
   border-radius:18px;
   padding:12px;
   text-transform: none;
   color:var(--light-black);
   width: 100%;
   font-size: 17px;
}

.side-bar .reset-btn .btn{
   margin-top: 20px;
   width: 100%;
}

#side-menu{
   position: fixed;
   top:20px; left:20px;
   height: 50px;
   width: 50px;
   line-height: 50px;
   text-align: center;
   background-color: var(--white);
   color:var(--black);
   cursor: pointer;
   font-size: 25px;
   z-index: 1100;
   box-shadow: var(--box-shadow);
   border:var(--border);
   display: none;
}

.image-popup{
   position: fixed;
   top:0; left:0;
   z-index: 1200;
   background-color: var(--dark-bg);
   height: 100vh;
   width: 100%;
   display: none;
   align-items: center;
   justify-content: center;
   padding:100px 20px;
   overflow-y: scroll;
}

.image-popup img{
   width:600px;
   cursor: pointer;
   border:10px solid var(--white);
   background-color: var(--white);
   border-radius:15px;
}





@media (max-width:1200px){

   .gallery{
      padding-left: 20px;
   }

   #side-menu{
      display: block;
   }

   #side-menu.fa-times{
      top:0;
      left: 300px;
   }

   .side-bar{
      left: -350px;
   }

   .side-bar.active{
      box-shadow: 0 0 0 100vw var(--dark-bg);
      left:0;
      z-index: 1000;
   }

}

@media (max-width:768px){

   .image-popup img{
      width: 100%;
   }

}

@media (max-width:450px){

   #side-menu.fa-times{
      top:10px;
      left: 10px;
   }

   .side-bar.active{
      padding-top: 70px;
   }

} 
   </style>

</head>
<body>

<div id="side-menu" class="fas fa-bars"></div>   

<div class="side-bar">
   <div class="box">
   <center><h3 class="title">Search Image </h3></center>
      <input type="text" placeholder="search here..." id="search-box">
   </div>
   <div class="box">
     <center> <h3 class="title">category</h3></center>
      <div class="category">
         <div class="btn active" data-category="all"> All </div>
         <div class="btn" data-category="Kottu">Kottu</div>
         <div class="btn" data-category="Barotta">Barotta</div>
         <div class="btn" data-category="Noodles">Noodles</div>
         <div class="btn" data-category="Bites">Bites</div>
          <div class="btn" data-category="Special">Special</div>
      </div>
   </div>
   
   <div class="reset-btn"><div class="btn">reset all</div>
<a href="index.php" class="btn active">Back To Home</a></div>
</div>

<div class="gallery">

   <h1 class="heading"><span style="color:#ffb03b;"><b>Mr Kottu</b></span> Food Gallery</h1>

   <div class="image-container">
   <?php 

include 'connection.php';
                    
                    $galary=mysqli_query($con,"SELECT * FROM gallery ORDER BY Date DESC");
                    if(mysqli_num_rows($galary)>0)
                    {
                        while($galary_fetch=mysqli_fetch_assoc($galary))
                        {
                            $g_name=$galary_fetch['Name'];
                            $Title=$galary_fetch['Title'];
                            
                            ?>
       <center><div class="col"><div class="card"><div class="card-body">                     
      <img class="card-img-top img-fluid" src="<?php echo $g_name; ?>" data-cat="<?php echo $Title; ?>" data-search="<?php echo $Title; ?>" width="400" height="400" alt="" style=" border-radius:15px;">
                        </div></div></div></center>

      <?php } } ?>
      
   </div>

</div>

<div class="image-popup">
   <img src="" alt="">
</div>


<script>
let sideMenu = document.querySelector('#side-menu');
let sideBar = document.querySelector('.side-bar');

sideMenu.onclick = () =>{
   sideMenu.classList.toggle('fa-times');
   sideBar.classList.toggle('active');
};

let galleryImages = document.querySelectorAll('.image-container img');
let imagePop = document.querySelector('.image-popup');

galleryImages.forEach(img =>{
   img.onclick = () =>{
      let imageSrc = img.getAttribute('src');
      imagePop.style.display = 'flex';
      imagePop.querySelector('img').src = imageSrc;
   };
});

imagePop.onclick = () =>{
   imagePop.style.display = 'none';
};

document.querySelector('#search-box').oninput = () =>{
   var value = document.querySelector('#search-box').value.toLowerCase();
   galleryImages.forEach(img =>{
      var filter = img.getAttribute('data-search').toLowerCase();
      if(filter.indexOf(value) > -1){
         img.style.display = 'block';
      }else{
         img.style.display = 'none';
      };
   });
};

let categoryBtn = document.querySelectorAll('.category .btn');

categoryBtn.forEach(btn =>{
   btn.onclick = () =>{
      categoryBtn.forEach(remove => remove.classList.remove('active'));
      let dataCategory = btn.getAttribute('data-category');
      galleryImages.forEach(img =>{
         var imgCat = img.getAttribute('data-cat');
         if(dataCategory == 'all'){
            img.style.display = 'block';
         }else if(dataCategory == imgCat){
            img.style.display = 'block';
         }else{
            img.style.display = 'none';
         }
      });
      btn.classList.add('active');
   };
});

let typeBtn = document.querySelectorAll('.type .btn');

typeBtn.forEach(btn =>{
   btn.onclick = () =>{
      typeBtn.forEach(remove => remove.classList.remove('active'));
      let datatype = btn.getAttribute('data-type');
      galleryImages.forEach(img =>{
         var imgtype = img.getAttribute('src').split('.').pop();
         if(datatype == 'all'){
            img.style.display = 'block';
         }else if(datatype == imgtype){
            img.style.display = 'block';
         }else{
            img.style.display = 'none';
         }
      });
      btn.classList.add('active');
   };
});

document.querySelector('.reset-btn .btn').onclick = () =>{
   window.location.reload();
};

</script>

</body>
</html>