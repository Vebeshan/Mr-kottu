<?php

include 'connection.php';
session_start();

if(isset($_SESSION['id']))
{
   $user_id=($_SESSION['id']);

   $del_query=mysqli_query($con,"DELETE FROM cart WHERE Customer_ID='$user_id' ");

if($del_query)
{
    echo "<script> alert('Your Cart Products Successfully Deleted...');";
    header('location:cart.php');
}
else
{
    echo "<script> alert('Your Cart Products Not Deleted...');";
}

}

else
{     
      header('location:Customer_Login.php'); 
}

?>