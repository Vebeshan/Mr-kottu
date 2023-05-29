<?php
      include 'connection.php';

      $sql="SELECT * FROM products ORDER BY Product_ID DESC";
      $res=mysqli_query($con,$sql);
      echo '<div class="container-fluid"><div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center">';
      while($row=mysqli_fetch_assoc($res)) { ?>

          <?php
          
          $id=$row['Product_ID'];
          if($row['status']==1)
          {
             $status="<span class='text-success'> Available </span>";
          }
          else
          {
            $status="<span class='text-danger'> Not Available </span>";
          }
          
          ?>

        <div class="col-md-3"><div class=" table card shadow-sm"><div class="card-body">
        <img class="card-img-top" src="updated_photo/<?php echo $row['image']; ?>" height="150" wight="100" alt="Product_Img">
        <h4 class="card-title"><?php echo $row['Product_Name']; ?></h4>
        <p class="card-text">Category :<?php echo $row['Type']; ?></p>
        <p class="card-text">Price :Rs<?php echo $row['Price']; ?></p>
        <p class="card-text">Status :<?php echo $status; ?></p>
                 
      </div>
      </div>
      </div>
      
      
      <?php } ?>
      </div>
      </div>
        </div>

      