<?php
include 'connection.php';

if(isset($_POST['add']))
{
   $fname=$_POST['pname'];
   $img_count=count($_FILES["image"]["name"]);

   for($x=0; $x<$img_count; $x++)
   {
     $img=$_FILES["image"] ["name"] [$x];
     move_uploaded_file($_FILES["image"]["tmp_name"]['$x'], "updated_photo/".$_FILES["image"]["name"][$x]);

     $sql="INSERT INTO galary(Name,photo) VALUES ( '$fname',' $img')";
     $res=mysqli_query($con,$sql);
   }

   if($res)
   {
    echo "<script> alert 'Galary Added Sucessfully'; </script> ";
   }
   else
   {
      die(mysqi_error($con));
   }
   
}
?>