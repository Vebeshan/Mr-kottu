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

$sql=mysqli_query($con,"SELECT * FROM resturent");
$row=mysqli_fetch_array($sql);

if($row['status']=='1')
{
    $sat='0';
}
else
{
     $sat='1';
}

$query=mysqli_query($con,"UPDATE resturent SET status='$sat' ");

if($query)
{
    echo '<script> alert("Status Updated"); location.replace("Settings.php");</script>';
}
else
{
   echo '<script> alert("Status Not Updated"); location.replace("Settings.php"); </script>';
}

mysqli_close($con);
?>