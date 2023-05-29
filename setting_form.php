<?php

include 'connection.php';

$select=mysqli_query($con,"SELECT * FROM resturent");
$row=mysqli_fetch_assoc($select);
$status=$row['status'];

?>

<?php

if(isset($_POST['save']))
{
   $phone=$_POST['phone'];
   $address=$_POST['address'];
   $mail=$_POST['mail'];
   $day_to=$_POST['day'];
   $day_from=$_POST['day2'];
   $am=$_POST['am'];
   $pm=$_POST['pm'];
   
            $logoimg= $_FILES['logo']['name'];
            $logoimg_tmp_name = $_FILES['logo']['tmp_name'];
            $logoimg_folder = 'updated_photo/'.$logoimg;

   $update=mysqli_query($con,"UPDATE resturent SET phone_No='$phone' , address='$address', Email='$mail', open_to='$day_to' , close_from='$day_from', open_hour_am='$am' , closed_hour_pm='$pm' , status='1', photo='$logoimg' WHERE resturent_Name=resturent_Name");

   IF($update)
   {
        move_uploaded_file($logoimg_tmp_name, $logoimg_folder);
    echo "<script> alert('Settings Updated'); location.replace('Settings.php'); </script>";
     
   }
   else
   {
    echo "<script> alert('Settings Not Updated'); </script>";
   }
}
?>

<div class="container align-items-center justify-content-center shadow-sm">
       <div class="row">
         <div class="col-12">
         <div class="card">
            <div class="card-body">
              <div class="card-title text-center"><h3>Resturant Settings</h3></div>
              <div class="table-responsive">
               <table class="table">
               <table width="100%" align="center" cellpadding="5" cellspacing="5">
               <form method="post" enctype="multipart/form-data">
                <tr>
                    <th>
                <label>Resturant Name</label>
               <input type="text" name="name" class="form-control" placeholder="Enter Food Name" value="<?php echo $row['resturent_Name']; ?>">
                        </th></tr>

                       <tr> <th>
                   <label>Resturant Mobile Number</label>
                <input type="tel" name="phone" class="form-control" required="required" placeholder="Enter Mobile Number" value="<?php echo $row['phone_No']; ?>">
                        </th>
                        </tr>
                        <tr>
                            <th>
                   <label>Resturant Address</label>
                <input type="text" name="address" class="form-control" required="required" placeholder="Enter Address" value="<?php echo $row['address']; ?>">
                        </th></tr>
                   
                   <tr>
                            <th>
                   <label>Resturant E-mail</label>
                <input type="text" name="mail" class="form-control" required="required" placeholder="Enter Email" value="<?php echo $row['Email']; ?>">
                        </th></tr>
                       
                        <tr>
    <th><label>Open Day To </label>
                 <select class="form-control" name="day" required>
                 <option value=""><?php echo $row['open_to']; ?></option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select></th></tr>

               <tr> <th><label>From </label>
                 <select class="form-control" name="day2" required>
                  <option value=""><?php echo $row['close_from']; ?></option>
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select></th>
</tr>

     <tr><th><br><label>Open Hours</label></th></tr>

                <tr><th><label>Time AM</label>
<input type="number" name="am"  class="form-control" required="required"  value="<?php echo $row['open_hour_am']; ?>"  maxlength="2" minlength="1">
<th></tr>
<tr><th>
<label>Time PM</label>
<input type="number" name="pm"  class="form-control" required="required" value="<?php echo $row['closed_hour_pm']; ?>"  maxlength="2" minlength="1"></th></tr>

</tr>
                   <tr>
                       <th> <label>Logo</label>
                       <input type="file" name="logo" class="form-control" accept="image/jpg, image/png, image/jpeg" value="<?php echo $row['photo']; ?>">
                      </th>
                   </tr>

<tr><th><br><label>status</label>
    
    <?php echo $status; ?>
    
                <label class="custom-control teleport-switch">
                <span class="teleport-switch-control-description" name="off">Off</span>
                <a <?php echo 'href="toogle_settings_update.php?update_toogle='.$status.' " '; ?> >
                <input type="checkbox" class="teleport-switch-control-input" name="toggle" <?php if($status=='1') {echo 'checked';} ?>>
                <span class="teleport-switch-control-indicator"></span>
                <span class="teleport-switch-control-description" name="on">On</span>
                <span class="labels" 
              </label></a>
        
        </th>
                   
                   </tr>
<tr>
          <th><center>
            <input type="submit" value="Save Changes" name="save" class="btn btn-success">
            <input type="Reset" value="Cancel" name="del" class="btn btn-warning">
</center></th>
</tr>
                </form>
</table>
</div></div></div></div></div></div></div>
<!--Start footer-->
<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2022 Mr kottu
        </div>
      </div>
    </footer>
	<!--End footer-->