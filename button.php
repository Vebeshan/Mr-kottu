<?php
include "connection.php";

if (isset($_POST['uploadImageBtn'])) {
    
    $name=$_POST['image_Name'];
    $uploadFolder = 'updated_photo/';
    foreach ($_FILES['imageFile']['tmp_name'] as $key => $image) {
        $imageTmpName = $_FILES['imageFile']['tmp_name'][$key];
        $imageName = $_FILES['imageFile']['name'][$key];
        $result = move_uploaded_file($imageTmpName,$uploadFolder.$imageName);


        $query=mysqli_query($con,"INSERT INTO galary(id,Name,photo) VALUES('','$name','$imageName')");
       
    }
    if ($result) {
        echo '<script>alert("Images uploaded successfully !")</script>';
        echo '<script>window.location.href="file.php";</script>';
    }
}
