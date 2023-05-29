<?php

include 'connection.php';

session_start();

if(isset($_POST['login']))
{
    $id=$_POST['id'];
    $pass=$_POST['pass'];
    
    $check=mysqli_query($con,"SELECT * FROM profile_login WHERE Profile_ID='$id' AND Password='$pass' ");
    $row=mysqli_fetch_array($check);
    if(mysqli_num_rows($check)>0)
    {
        $_SESSION['Profile_ID']=$row['Profile_ID'];
        header('location:Profile.php');
    }
    else
    {
      echo ("<script> alert('Invalid Username or Password'); location.replace('Profile_login.php'); </script>");
    }
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Profile Signin </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
	html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
	
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
	
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form method="post" enctype="multipart/form-data">
    <img class="mb-4" src="assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control is-invalid" id="floatingInput" placeholder="Enter ID" required name="id">
      <label for="floatingInput">ID</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control is-valid" id="floatingPassword" placeholder="Enter Password" required name="pass">
      <label for="floatingPassword">Password</label>
    </div>
	
    <input type="submit" class="w-100 btn btn-lg btn-primary" value="Sign in" name="login">
    <p class="mt-5 mb-3 text-muted">&copy; 2022–2023</p>
  </form>
</main>


    
  </body>
</html>
