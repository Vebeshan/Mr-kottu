<?php

include 'connection.php';
$sql = "select * from customer";

$result = mysqli_query($con, $sql);

?>


<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
          
  <table class="table table-striped">
  <?php 
  
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td> " . $row["Name"]"</td><tr>";
    }


mysqli_close($con);

  ?>
  
  </table>
</div>

</body>
</html>
