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
$sql="select status from admin where ID=$toogleid";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);


if($row['status']==1)
{
   $toogle_status='0';
}
else
{
    $toogle_status='1';
}
	$update="UPDATE `admin` SET `status` = '$toogle_status' WHERE `admin`.`ID` = $toogleid";
	$output=mysqli_query($con,$update);

	if($output)
	{
        echo "<script> alert('User Status Updated'); location.replace('Admin.php');</script>";
		
	}
	else
	{
		die(mysqli_error($con));
        echo "<script> alert('User Status Not Updated'); location.replace('Admin.php');</script>";
	}
	mysqli_close($con);
?>