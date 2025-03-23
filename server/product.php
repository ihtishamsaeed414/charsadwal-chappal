<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");
    require("include/header.inc.php");
    if(!isset($_SESSION)){ 
        session_start(); 
    }

    if(isset($_POST['addbtn'])){
        $name = $_POST['namebox'];
        $price = $_POST['pricebox'];
        $cat_name = $_POST['catbox'];
        $sale = $_POST['salebox'];

        // for main image
        $image_name = $_FILES['imagebox']['name'];
        $image_type = $_FILES['imagebox']['type'];
        $image_location = $_FILES['imagebox']['tmp_name'];    
        $image_future_path = "images/";
    
        move_uploaded_file($image_location,$image_future_path.$image_name);
            $image =$image_future_path.$image_name;
        
        // for first image
        $image_name1 = $_FILES['imagebox1']['name'];
        $image_type1 = $_FILES['imagebox1']['type'];
        $image_location1 = $_FILES['imagebox1']['tmp_name'];    
        $image_future_path1 = "images/";
    
        move_uploaded_file($image_location1,$image_future_path1.$image_name1);
            $image1 =$image_future_path1.$image_name1;

        // for second image
        $image_name2 = $_FILES['imagebox2']['name'];
        $image_type2 = $_FILES['imagebox2']['type'];
        $image_location2 = $_FILES['imagebox2']['tmp_name'];    
        $image_future_path2 = "images/";
    
        move_uploaded_file($image_location2,$image_future_path2.$image_name2);
            $image2 =$image_future_path2.$image_name2;
        
        // for third image
        $image_name3 = $_FILES['imagebox3']['name'];
        $image_type3 = $_FILES['imagebox3']['type'];
        $image_location3 = $_FILES['imagebox3']['tmp_name'];    
        $image_future_path3 = "images/";
    
        move_uploaded_file($image_location3,$image_future_path3.$image_name3);
            $image3 =$image_future_path3.$image_name3;
        
        // 
        $image_name4 = $_FILES['imagebox4']['name'];
        $image_type4 = $_FILES['imagebox4']['type'];
        $image_location4 = $_FILES['imagebox4']['tmp_name'];    
        $image_future_path4 = "images/";
    
        move_uploaded_file($image_location4,$image_future_path4.$image_name4);
            $image4 =$image_future_path4.$image_name4;
        
        if($cat_name == 'kaptan')
          $cat_id = 1;

        if($cat_name == 'charsadwal')
          $cat_id = 2;  

        if($cat_name == 'peshawari')
          $cat_id = 3;  

      echo  $add_product_query = "INSERT INTO product (product_name,product_price,sale, main_image, image_1, image_2, image_3, image_4, cat_id, cat_name) VALUES('$name', '$price', '$sale', '$image', '$image1', '$image2', '$image3', '$image4','$cat_id','$cat_name')";
        
       echo $execute = mysqli_query($connect,$add_product_query);

        if($execute){
            ?>
              <script>
                  window.open("http://localhost/CharsadwalChappal/server/product.php", "_self");
              </script>
            <?php
        }else{
            ?>
              <script>
                  window.alert("Product Addition failed 😥");
              </script>
            <?php
        }
    }
?>

<html>
    <head>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <!-- JavaScript Bundle with Popper -->
       <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>


    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
     rel="stylesheet"/>
    <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <div class="layout">
        <div class="side-bar">
            <ul class="option-list">
             <li><a href="dashboard.php">Categories</a></li>
             <li><a href="product.php">Products</a></li>
             <li><a href="order.php">Orders</a></li>
             <li><a href="order.php">Customers</a></li>
            </ul>
         </div>
    <section class="main-section">
        <h3 class="heading">Products</h3>
    <form method="post" enctype="multipart/form-data" class="form">
        <div class="container-form">
          <div class="flex">
       <input  type="text" name="namebox" required placeholder="Name" class="input">
       <input  type="text" name="pricebox" required placeholder="Price" class="input">
       <input  type="text" name="salebox" required placeholder="active or inactive" class="input">
       <input  type="text" name="catbox" required placeholder="Category name" class="input">
       </div>
      <div class="flex-image">
        <div>
          <label class="label" for="image">Main image:</label> 
          <input type="file" name="imagebox" id="image"  class="input-file" required>
        </div>
        <div>
          <label>Image 1:</label> 
          <input type="file" name="imagebox1"  class="input-file" > 
        </div>
        <div>
          <label>Image 2:</label> 
          <input type="file" name="imagebox2"  class="input-file" ></div>
        <div>
          <label>Image 3:</label>  
          <input type="file" name="imagebox3"  class="input-file" ></div>
        <div>
          <label>Image 4:</label> 
          <input type="file" name="imagebox4" class="input-file"  >
        </div>
    </div>
    <input class="btn-add pro-add" type="submit" value="Add Product" name="addbtn">
    </div>
</form>

<table border="2" class="table">
    <th>ID</th><th>Category name</th></th><th>Product Name</th><th>price</th><th>sale</th><th>image</th><th>Delete</th><th>Edit</th>
    <?php
        //Fetch all product data from the database-->
        $query = "SELECT * FROM product LEFT OUTER JOIN category ON product.cat_id = category.cat_id";
       // echo $query;
       $result = mysqli_query($connect,$query);
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['product_id'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $cat_name = $row['cat_name'];
            $sale = $row['sale'];
            $image = $row['main_image']; 
            ?>
              <tr>
                <td class="align-middle"><?php echo $id ?></td>
                <td class="align-middle"><?php echo $cat_name ?></td>
                <td class="align-middle"><?php echo $name ?></td>
                <td class="align-middle"><?php echo $price ?></td>
                <td class="align-middle"><?php echo $sale ?></td>
                <td class="align-middle"><img src="<?php echo $image ?>" alt="image of product" height="100px" width="120px"></td>
                <td class="align-middle"><a href="delete.php ? id=<?php echo $id?> ">Delete</a></td>
                <td class="align-middle"><a href="update.php ? id=<?php echo $id?>">Update</a></td>
              </tr>
            <?php
        }
    ?>
            </table> 
        </section>
     </div>
   </body>
</html>

<?php
    require("include/footer.inc.php");
?>



<a href="cart.php?prod_id=<?php echo $prod_id ?>&cust_id=<?php echo $cust_id ?>"></a>
                <a href="orders.php?prod_id=<?php echo $prod_id ?>&cust_id=<?php echo $cust_id ?>"></a> 