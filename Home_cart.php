<?php

@include 'connection.php';

session_start();
$CustomerName=$_SESSION['name'];

$sql="SELECT * FROM customer WHERE Name='$CustomerName' ";
$res=mysqli_query($con,$sql);


if(mysqli_num_rows($res)>0)
{
     $row=mysqli_fetch_assoc($res);
     $cus_ID=$row['Customer_ID'];
    
}
else
{
     $cus_ID="0";
}

if(isset($_POST['Cart'])){

   $product_name = $_POST['name'];
   $product_price = $_POST['price'];
   $product_quantity ="1";
   $product_image = $_POST['image'];

   $select_cart = mysqli_query($con, "SELECT * FROM `cart` WHERE Name = '$name'");
   $check_cart=mysqli_query($con, "SELECT * FROM `cart` WHERE  = '$name'");

   if(mysqli_num_rows($select_cart) > 0)
   {
     echo'<script> alert("Special Food already added to cart"); location.replace("index.php");</script>';
   }
   
   else{
      $insert_product = mysqli_query($con, "INSERT INTO `cart`(ID,Name, Price, Qty,Image,Customer_ID) VALUES('','$product_name', '$product_price', '$product_quantity','$product_image','$cus_ID')");

      if($insert_product)
      {
         echo'<script> alert("Special Food added to cart"); location.replace("index.php");</script>';
      }
      else
      {
         echo'<script> alert("Special Food not added to cart"); location.replace("index.php");</script>';
      }
   }
}

?>