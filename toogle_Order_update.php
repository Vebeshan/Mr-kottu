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
}

else
{
  header('location:login_form.php');
}


$toogleid=$_GET['update_toogle'];
$sql="select * from order_details where Order_ID=$toogleid";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

$cus_ID=$row['Customer_ID'];
$cus_Name=$row['Name'];
$Product_Name=$row['Product_Name'];
$Price=$row['Price'];
$Qty=$row['Qty'];
$Total=$row['Total'];

$product_price =($Price * $Qty);

if($row['status']==1)
{
   header('location:order_form.php');
}
else
{
   if($row['status']==0)
   {

       $toogle_status=1;
   }
}

        //order_details table
	    $update="UPDATE `order_details` SET `status` = '$toogle_status' WHERE Order_ID= '$toogleid' ";
    	$output=mysqli_query($con,$update);



$full_name[] = $Product_Name . ' ' .'Qty' .' (' . $Qty .') '.'Price'.' (' . $Price .') ';
$total_product = implode(', ',$full_name);

        $insert_Notify=mysqli_query($con,"INSERT INTO notifications(order_ID,name,type,message,Total,status,date,Customer_ID) VALUES('$toogleid','$cus_Name','Delivered','$total_product','$product_price','unread',now(),'$cus_ID')");

      $insert_order=mysqli_query($con,"INSERT INTO delivery(ID,Order_ID,Customer_ID,Name,Product_name,price,qty,Total,Date) VALUES(null,'$toogleid','$cus_ID','$cus_Name','$Product_Name','$Price','$Qty','$product_price',now())");


       


	if($output && $insert_order && $insert_Notify)
	{
        
        echo "<script> alert('Order Status Updated'); location.replace('order_form.php');</script>";
        
		
	}
	else
	{
		die(mysqli_error($con));
        echo "<script> alert('Order Status Not Updated'); location.replace('order_form.php');</script>";
	}

	
	mysqli_close($con);
?>