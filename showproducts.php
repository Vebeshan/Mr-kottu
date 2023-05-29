
<center><div class="container"><table class="table table-bordered" width="100%"><tr><form method="POST" action="Admin_product_search.php">
    <th colspan="6"><h5 class="title text-center">Search product</h5></th></tr>
    <tr>
        <th colspan="6">
      <input type="text" placeholder="Search Here..." name="search_type" class="from-control" required>
            <input type="submit" name="search" value="Search" class="btn btn-info btn-md"></th>
    </tr>
    </form></table></div></center>

<?php
      include 'connection.php';

      $sql="SELECT * FROM products ORDER BY Product_ID DESC ";
      $res=mysqli_query($con,$sql);
      echo '<div class="container-fluid"><div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 text-center">';
      while($row=mysqli_fetch_assoc($res)) { ?>

          <?php
          
          $id=$row['Product_ID'];
          $status=$row['status'];
          $pname=$row['Product_Name'];
          
          ?>

        <div class="col-md-3"><div class="card shadow-sm"><div class="card-body">
        <img class="card-img-top" src="updated_photo/<?php echo $row['image']; ?>" height="150" wight="100" data-cat="<?php echo $pname; ?>" data-search="<?php echo $pname; ?>" alt="Product_Img">
        <h4 class="card-title"><?php echo $row['Product_Name']; ?></h4>
        <p class="card-text">Category :<?php echo $row['Type']; ?></p>
        <p class="card-text">Price :Rs<?php echo $row['Price']; ?></p>
        <div class="mb-4">
                    <label class="custom-control teleport-switch">Status<br>
                <span class="teleport-switch-control-description" name="off">Off</span>
                <a <?php echo 'href="toogle_product_update.php?update_toogle='.$id.' " '; ?> >
                <input type="checkbox" class="teleport-switch-control-input" name="toggle" <?php if($status=='1') {echo 'checked';} ?>>
                <span class="teleport-switch-control-indicator"></span>
                <span class="teleport-switch-control-description" name="on">On</span>
                <span class="labels" 
              </label></a>
                        
                  </div>
                  <a href="update_product.php?edit=<?php echo $row['Product_ID']; ?>" class='btn btn-md btn-warning'><i class="fas fa-edit"></i>Update</a>
               <a href="product.php?delete=<?php echo $row['Product_ID']; ?>" class='btn btn-md btn-danger' onclick="return confirm('Are You Sure You Want To Delete this?');"><i class="fas fa-trash"></i>Delete</a>
      </div>
      </div>
      </div>
      
      <?php } ?>
      </div>
      </div>
        </div>