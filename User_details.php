<?php

include 'connection.php';

if(isset($_GET['did']))
{
	$id=$_GET['did'];

	$sql="delete from admin where ID=$id ";

	$res=mysqli_query($con,$sql);
	if($res)
	{
		header("location:admin.php");
	}
	else
	{
		die(mysqli_error($con));
	}
}
?>

<?php

include 'connection.php';

$sql="SELECT * FROM admin WHERE NOT Name='$admin_name' ";
$res=mysqli_query($con,$sql);
echo '<center><div class="container row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center">';
while($row=mysqli_fetch_assoc($res)) {
  
 $user_id=$row['ID'];
 $status=$row['status'];

  ?>

  <div class="col-md-3"><div class="card shadow-sm"><div class="card-body">
  <img class="card-img-top img-responsive" src="updated_photo/<?php echo $row['image']; ?>" width="300" height="250" alt="Product_Img">
  <h4 class="card-title"><?php echo $row['Name']; ?></h4>
  <p class="card-text">Email :<?php echo $row['Email']; ?></p>
  <p class="card-text">Type :<?php echo $row['Type']; ?></p>
  <div class="mb-4">
 
              <label class="custom-control teleport-switch">Status<br>
                <span class="teleport-switch-control-description" name="off">Off</span>
                <a <?php echo 'href="toogle_update.php?update_toogle='.$user_id.'"'; ?> >
                <input type="checkbox" class="teleport-switch-control-input" name="toggle" <?php if($status=='1') {echo 'checked';} ?>>
                <span class="teleport-switch-control-indicator"></span>
                <span class="teleport-switch-control-description" name="on">On</span>
                <span class="labels" 
              </label></a>
            </div>
           
  <a <?php echo 'href="update_user.php?uid='.$user_id.' "'; ?> class="btn btn-md btn-success" ><i class="fas fa-edit"></i>Update</a>
  <a <?php echo 'href="User_details.php?did='.$user_id.' "'; ?> class="btn btn-md btn-danger" onclick="return confirm('are your sure you want to delete this?');"><i class="fas fa-trash"></i>Delete</a> 
 
</div>
</div>
</div>


<?php } ?>
</div>
</div>
</center>

 <!--Start footer-->
 <footer class="footer">
    <div class="container">
      <div class="text-center">
        Copyright © 2022 Mr Kottu
      </div>
    </div>
  </footer>
 <!--End footer-->
