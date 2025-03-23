<?php
  require("include/header.inc.php");
  
  
  $prod_id = $_GET['prod_id'];       
  if(isset($cust_id)){
    $cust_id = $_GET['cust_id'];
  }
  
  /////////////////// Adding product to customer cart ///////////////////////////
  
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/general.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Product</title>
  </head>
  <body>
    <main>
      <?php
      include("include/connection.inc.php");
      $get_products_query = "SELECT * FROM product WHERE product_id =  '$prod_id'";

      $result = mysqli_query($connect, $get_products_query);
    
      // $row = mysqli_fetch_assoc($result);
      
      while($row = mysqli_fetch_assoc($result)){
        $name = $row['product_name'];
        $price = $row['product_price'];
        $image = "../server/" .$row['main_image'];
        $img_1 = "../server/" .$row['image_1'];
        $img_2 = "../server/" .$row['image_2'];
        $img_3 = "../server/" .$row['image_3'];
        $img_4 = "../server/" .$row['image_4'];
       ?>
          <section class="section-product" id="sproduct">
        <div class="product-imgs">
          <div class="main-img-cont">
            <img class="main-img" src="<?php echo $image ?>" alt="image" />
          </div>

          <div class="small-imgs">
            <img class="small-img" src="<?php echo $img_1 ?>" alt="image" />
            <img class="small-img" src="<?php echo $img_2 ?>" alt="image" />
            <img class="small-img" src="<?php echo $img_3 ?>" alt="image" />
            <img class="small-img" src="<?php echo $img_4 ?>" alt="image" />
          </div>
        </div>
         

        <div class="product-description">
          <h3 class="product-title"><?php echo $name ?></h3>
          <div class="price-tag">
            <span class="unit">Rs.</span>
            <p class="price"><?php echo $price ?></p>
          </div>
          <form method="post">
          <div class="quantity-cont q-margin">
            <span class="q-label">Quantity</span>
            <button class="btn-change-q btn-decr">-</button>
            <input
              type="number"
              name="productQuantity"
              id="input-quantity"
              value="1"
              min="1"
            />
            <button class="btn-change-q btn-incr">+</button>
          </div>
          <div class="size-cont">
            <span class="size-tag">size</span>
            <select name="size" id="size">
              <option value="">Select your Size</option>
              <option value="">7</option>
              <option value="">7.5</option>
              <option value="">8</option>
              <option value="">8.5</option>
              <option value="">9</option>
              <option value="">9.5</option>
            </select>
          </div>
          <div class="btns">
            <?php
              if(isset($cust_id)){
                ?>
                <input class="btn-ctn btn-add-cart" type="submit" value="Add To Cart" name="addcartbtn">
                <input class="btn-ctn btn-buy-now" type="submit"value="Buy Now" name="buybtn">
                <?php
              }else{
                ?>
                <a href="http://localhost/CharsadwalChappal/client/login.php"class="btn-ctn btn-add-cart" >Add To Cart</a>
                <a href="http://localhost/CharsadwalChappal/client/login.php" class="btn-ctn btn-buy-now">Buy Now</a>
                <?php
              }
            ?>
          </div>
          </form>
        </div>
      </section>
       <?php

      }
       ?>

      
     
      <div class="description">
        <h1 class="heading-desc">Comfortable, Smooth and Best Quality</h1>
        <ul>
          <li>Made with Genuine Leather.</li>
          <li>uppers and durable rubber sole.</li>
          <li>Extremely versatile.</li>

          <li>handcrafted to perfection by skilled artisans.</li>

          <li>
            High-quality leather: Genuine leather material, Soft Comfortable.
          </li>
          <li>Safe walking Comfortable and Soft Non-Slip outsole.</li>
          <li>
            Rubber sole Hand-Stitching and Durable Traditional Peshawari
            Chappal.
          </li>
        </ul>
      </div>

      <section class="section-maylike">
        <h1 class="heading-like">You May Also Like</h1>
        <div class="cards grid grid-cols-6">
          <div class="card">
            <span class="sale-tag">Sale</span>
            <div class="cont-pic">
              <img class="card-pic" src="images/chappal.png" alt="" />
            </div>
            <span class="product-name"><a class="name-link" href="">Kaptan Chappal Leather</a></span>
            <div class="price-tag">
              <p class="unit">Rs.</p>
              <span class="price">2400</span>
            </div>
            <!-- <div class="review">
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <span class="review-count">(234)</span>
        </div> -->
          </div>
          <div class="card">
            <div class="cont-pic">
              <img class="card-pic" src="images/chappal-2.jpg" alt="" />
            </div>
            <span class="product-name"><a class="name-link" href="">Kaptan Chappal Leather</a></span>
            <div class="price-tag">
              <p class="unit">Rs.</p>
              <span class="price">2400</span>
            </div>
            <!-- <div class="review">
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <span class="review-count">(234)</span>
        </div> -->
          </div>
          <div class="card">
            <div class="cont-pic">
              <img class="card-pic" src="images/chappal-3.jpg" alt="" />
            </div>
            <span class="product-name"><a class="name-link" href="">Kaptan Chappal Leather</a></span>
            <div class="price-tag">
              <p class="unit">Rs.</p>
              <span class="price">2400</span>
            </div>
            <!-- <div class="review">
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <span class="review-count">(234)</span>
        </div> -->
          </div>
          <div class="card">
            <span class="sale-tag">Sale</span>
            <div class="cont-pic">
              <img class="card-pic" src="images/chappal-4.jpg" alt="" />
            </div>
            <span class="product-name"><a class="name-link" href="">Kaptan Chappal Leather</a></span>
            <div class="price-tag">
              <p class="unit">Rs.</p>
              <span class="price">2400</span>
            </div>
            <!-- <div class="review">
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <span class="review-count">(234)</span>
        </div> -->
          </div>
          <div class="card">
            <div class="cont-pic">
              <img class="card-pic" src="images/chappal-5.jpg" alt="" />
            </div>
            <span class="product-name"><a class="name-link" href="">Kaptan Chappal Leather</a></span>
            <div class="price-tag">
              <p class="unit">Rs.</p>
              <span class="price">2400</span>
            </div>
            <!-- <div class="review">
          <div class="stars">⭐⭐⭐⭐⭐</div>
          <span class="review-count">(234)</span>
        </div> -->
          </div>
        </div>
      </section>
    </main>
    <script src="js/product.js"></script>
  </body>
</html>


<?php
  require("include/footer.inc.php");
?>