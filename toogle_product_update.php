<?php

include 'connection.php';

session_start();

$admin_name=$_SESSION['admin_name'];
$admin_Email=$_SESSION['admin_Email'];
$admin_Type=$_SESSION['admin_Type'];
$admin_image=$_SESSION['admin_image'];


if($admin_id=isset($_SESSION['admin_id']))
{

$mrk=mysqli_query($con,"SELECT * FROM resturent");
$mrk_fetch=mysqli_fetch_assoc($mrk);

$r_name=$mrk_fetch['resturent_Name'];
$r_logo=$mrk_fetch['photo'];
}

else
{
  header('location:login_form.php');
}

?>




<?php

include 'connection.php';

$toogleid=$_GET['update_toogle'];

$sql=mysqli_query($con,"SELECT * FROM products WHERE Product_ID='$toogleid' ");
$row=mysqli_fetch_array($sql);

$Food_Name=$row['Product_Name'];

if($row['status']=='1')
{
    $sat='0';
}
else
{
     $sat='1';
}

$query=mysqli_query($con,"UPDATE products SET status='$sat' WHERE Product_ID=$toogleid");
mysqli_query($con,"UPDATE cart SET status='$sat' WHERE Name='$Food_Name' ");
$file_name="cart.php";

if($query)
{
    echo '<script> alert("Product Status Updated"); location.replace("product.php");</script>';
    echo '<meta http-equiv="refresh" content="5;url=\''.$file_name. '\' " />';
}
else
{
   echo '<script> alert("Product Status Not Updated"); location.replace("product.php"); </script>';
}



mysqli_close($con);
?>