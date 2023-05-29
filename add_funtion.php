<?php
include 'connection.php';

if(isset($_POST['Add']))
{
  $mname=$_POST['menuname'];
  $type=$_POST['type'];
  

  $uimage=$_FILES['photo']['name'];
  $uimage_tmp_name = $_FILES['photo']['tmp_name'];
  $uimage_folder = 'updated_photo/'.$uimage;

  $select=" SELECT * FROM special_menu WHERE Name='$mname' ";
  $query=mysqli_query($con,$select);
  if(mysqli_num_rows($query) > 0)
  {
    echo "<script type='text/javascript'> alert ('This Menu Already Added...'); </script>";
  }
  else
  {
    
      $sql="insert into special_menu(ID,Name,Category,photo) values('','$mname','$type','$uimage')";
      $res=mysqli_query($con,$sql);
  
      if($res)
      {
          echo "<script type='text/javascript'> alert ('Menu Added...'); </script> ";
        move_uploaded_file($uimage_tmp_name, $uimage_folder);
        header('location:menu.php');
      }
      else
      {
         echo "<script type='text/javascript'> alert ('Canot Add The Menu Already...'); </script>";
      }
    }
  
    }
else
{
     echo "<script type='text/javascript'> alert ('Canot Add The Menu Already...'); </script> ";
}
mysqli_close($con);
?>