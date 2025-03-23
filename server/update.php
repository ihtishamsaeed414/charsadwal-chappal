<?php
      include("include/connection.inc.php");
      $id = $_GET['id'];
      $query = "SELECT * FROM product WHERE product_id = '$id'";
      $execute = mysqli_query($connect, $query);
      $row = mysqli_fetch_array($execute);
      $image = $row['product_image'];
    ?>
    
    <h3>Update Record</h3>
    <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="input-cont"> 
          <span>Name:</span> 
          <input class="input" type="text" name="namebox" value="<?php echo $row['product_name'] ?>" required><br><br>
        </div>
        <div class="input-cont"> 
          <span>Price:</span>
          <input class="input" type="text" name="pricebox" value="<?php echo $row['product_price'] ?>" required><br><br>
        </div> 
        <div class="input-cont"> 
          <span>sale:</span>
          <input class="input" type="text" name="salebox" value="<?php echo $row['sale'] ?>" required><br><br>
        </div> 
        <div class="img-container">
          <img src="<?php echo $row['product_image'] ?>" alt="Image of the student" width="80px" height="80px">
        </div>

        <input type="file" name="filebox" value="Browse...">
        <input class="btn" type="submit" value="update" name="update">
      </form>
    </div>
  </body>
</html>


<!-- ///////////////updating record////////////// -->
<?php  
if(isset($_POST['update'])){
    $name = $_POST['namebox'];
    $price = $_POST['pricebox'];
    $sale = $_POST['salebox'];
    // image updation
        $file_name = $_FILES['filebox']['name'];
        
        if($file_name){ // if new image is uploaded then update it  in the database
          $file_type = $_FILES['filebox']['type'];
          $file_location = $_FILES['filebox']['tmp_name'];    
          $file_future_path = "images/";
      
          move_uploaded_file($file_location,$file_future_path.$file_name);
          $image_update = $file_future_path.$file_name;
     
          $updated_query =" UPDATE product SET product_name='$name', product_price='$price', sale = '$sale', product_image='$image_update' WHERE product_id='$id' ";
        }else{ // if new image is not uploaded then do not update the image
          $updated_query =" UPDATE product SET product_name='$name', product_price='$price', sale = '$sale', product_image='$image' WHERE product_id='$id' ";
        }
      
     $u_execute = mysqli_query($connect,$updated_query);
     if($u_execute){
         ?>
         <script>
             window.alert("UPDATED SUCCESSFULLY 🎉");
             window.open("http://localhost/CharsadwalChappal/server/product.php","_self")
         </script>
         <?php
     }
     else{
          ?>
          <script>
              window.alert("Updation failed!")
          </script>
          <?php
     }
}
?>
