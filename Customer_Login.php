<?php
include 'connection.php';
session_start();

if(isset($_POST['Login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = mysqli_query($con, "SELECT * FROM customer WHERE E_mail='$email' && Password='$password'");

    if(mysqli_num_rows($sql) > 0)
    { 
        
        $row=mysqli_fetch_array($sql);
        
        $_SESSION['name']=$row['Name'];
        $_SESSION['id']=$row['Customer_ID'];
        $_SESSION['Address']=$row['Address'];
        $_SESSION['Tel_no']=$row['Tel_no'];
        $_SESSION['E_mail']=$row['E_mail'];
        $success_msg[] = 'Logined Sucessfully ';
        header("Location:index.php");
    }
    else
    {
        
        $error_msg[] = 'Your Username Or Password Incorrect Try Again... ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body style="background-color: rgba(189, 145, 58, 0.5);">

    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-form">
                    <form id="booking-form" method="post">
                        <h2>Login </h2>
                        <div class="form-group form-input">
                            <input type="email" name="email" value="" required />
                            <label for="phone" class="form-label">Your Email</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="password" name="password" value="" id="id_password" required />
                            <label for="phone" class="form-label">Your Password</label>
                            <i class="far fa-eye" id="togglePassword" style="margin-left: 30px; cursor: pointer;"></i>
                            
                            
                        </div>
    
                        <div class="form-submit">
                            <p>Didn't Have Account?<a href="Customer_Register.php" > Register Now...</a></p>
                            <p><a href="forgetpass.php" >Forget Password...</a></p>
                            <br>
                            <center>
                            <input type="submit" value="Login" class="submit" name="Login">
                        </center>
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets_for_home/js/Register.js"></script>
    <script>
  const disabledKeys = ["c", "C", "x", "J", "u", "I"]; // keys that will be disabled

  const showAlert = e => {
    e.preventDefault(); // preventing its default behaviour
    return alert("Sorry, Mr kottu Says you can't view or copy source codes this way!");
  }

  document.addEventListener("contextmenu", e => {
    showAlert(e); // calling showAlert() function on mouse right click
  });

  document.addEventListener("keydown", e => {
    // calling showAlert() function, if the pressed key matched to disabled keys
    if((e.ctrlKey && disabledKeys.includes(e.key)) || e.key === "F12") {
      showAlert(e);
    }
  });
</script>
    
    <script>
const togglePassword = document.querySelector('#togglePassword');
  const password = document.querySelector('#id_password');

  togglePassword.addEventListener('click', function (e) {
    // toggle the type attribute
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    // toggle the eye slash icon
    this.classList.toggle('fa-eye-slash');
});
</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include 'alert.php'; ?>
</body>
</html>