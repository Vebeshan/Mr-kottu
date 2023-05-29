<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgetpassword Form </title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
     <link href="assets_for_home/img/Mr.K logo.JPG" rel="icon">
    <link href="assets_for_home/img/Mr.K logo.JPG" rel="apple-touch-icon">

    <!-- Main css -->
    <link rel="stylesheet" href="assets_for_home/css/Register.css">
</head>
<body style="background-image: url(assets/img/top-view-circular-food-frame.jpg);
              background-attachment: fixed;">
    <div class="main">
        <div class="container">
            <div class="booking-content">
                <div class="booking-form">
                    <form id="booking-form" method="post" enctype="multipart/form-data">
                        <h2>Reset Password </h2>
                        <div class="form-group form-input">
                            <input type="email" name="email" value="" required />
                            <label for="phone" class="form-label">Your Email</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="text" name="password" value="" required />
                            <label for="phone" class="form-label">Enter OTP</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="password" name="password" value="" required />
                            <label for="phone" class="form-label">New Password</label>
                        </div>

                        <div class="form-group form-input">
                            <input type="password" name="password" value="" required />
                            <label for="phone" class="form-label">Conform Password</label>
                        </div>
    
                        <div class="form-submit">
                            <p>Back To Login > <a href="Customer_login.php" > Login...</a></p>
                            <br>
                            <center>
                            <input type="submit" value="Reset" class="submit" name="Register">
                            <p>Your OTP NO Will Sent Your E-mail Address...</p>
                        </center>
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/Register.js"></script>
</body>
</html>