<?php
  require("include/header.inc.php");
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

    <title>CharsadwalChappal</title>
  </head>
  <body>
    <main>
      <section>
        <div class="slider">
          <div class="slide"><img src="assets/img-1.jpg" alt="Photo 1" /></div>
          <div class="slide"><img src="assets/img-2.jpg" alt="Photo 2" /></div>
          <div class="slide"><img src="assets/img-3.jpg" alt="Photo 3" /></div>
          <div class="slide"><img src="assets/img-4.jpg" alt="Photo 4" /></div>
          <button class="slider__btn slider__btn--left">&larr;</button>
          <button class="slider__btn slider__btn--right">&rarr;</button>
          <div class="dots"></div>
        </div>
      </section>
      <section class="catalogs">
        <section class="catalog" id="cat-1">
          <h1 class="heading-category">Kaptan Chappal</h1>
          <div class="cards grid grid-cols-6">
           <!--php code for fetching cards data  -->
          <?php
          include("include/connection.inc.php");
          $get_products_query = "SELECT * FROM product WHERE cat_id = '1'";

          $result = mysqli_query($connect, $get_products_query);
        
          // $row = mysqli_fetch_assoc($result);
          
          while($row = mysqli_fetch_assoc($result)){
            $prod_id = $row['product_id'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $image = "../server/" .$row['main_image'];
            $sale = $row['sale'];
            ?>
            
            <div class="card">
              <?php
                if($sale == "active"){
                  ?>
                  <span class="sale-tag">Sale</span>
                  <?php
                }
                ?>
              <div class="cont-pic">
                <img class="card-pic" src="<?php echo $image ?>" alt="image of product" />
              </div>
              <span class="product-name">
                 <?php
                 if(isset($cust_id)){
                   ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>&cust_id=<?php echo $cust_id ?>"><?php echo $name ?></a></span>
                   <?php
                 }else{
                  ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>"><?php echo $name ?></a></span>
                  <?php
                 }
                  ?>
              <div class="price-tag">
                <p class="unit">Rs.</p>
                <span class="price"><?php echo $price ?></span>
              </div>
            </div>
            <?php
          }
          ?>
          </div>
          <a class="btn-show-more" href="#">Show More &rArr;</a>
        
        </section>
        <section class="catalog" id="cat-2">
          <h1 class="heading-category">Peshawari Chappal</h1>
          <div class="cards grid grid-cols-6">
          <?php
          // include("include/connection.inc.php");
          $get_products_query = "SELECT * FROM product WHERE cat_id = '2'";

          $result = mysqli_query($connect, $get_products_query);
          
          while($row = mysqli_fetch_assoc($result)){
            $prod_id = $row['product_id'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $image = "../server/" .$row['main_image'];
            $sale = $row['sale'];
            ?>
            
            <div class="card">
              <?php
                if($sale == "active"){
                  ?>
                  <span class="sale-tag">Sale</span>
                  <?php
                }
                ?>
              <div class="cont-pic">
                <img class="card-pic" src="<?php echo $image ?>" alt="image of product" />
              </div>
              <span class="product-name">
                <?php
                 if(isset($cust_id)){
                   ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>&cust_id=<?php echo $cust_id ?>"><?php echo $name ?></a></span>
                   <?php
                 }else{
                  ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>"><?php echo $name ?></a></span>
                  <?php
                 }
                  ?>
              <div class="price-tag">
                <p class="unit">Rs.</p>
                <span class="price"><?php echo $price ?></span>
              </div>
            </div>
            <?php
          }
          ?>
          </div>
          <a class="btn-show-more" href="#">Show More &rArr;</a>
        </section>
        <section class="catalog" id="cat-sale">
          <h1 class="heading-category">Products on Sale</h1>
          <div class="cards grid grid-cols-6">
          <?php
          // include("include/connection.inc.php");
          $get_products_query = "SELECT * FROM product WHERE sale = 'active'";

          $result = mysqli_query($connect, $get_products_query);
          
          while($row = mysqli_fetch_assoc($result)){
            $prod_id = $row['product_id'];
            $name = $row['product_name'];
            $price = $row['product_price'];
            $img = $row['main_image'];
            $image = "../server/" .$img;
            $sale = $row['sale'];
            ?>
            
            <div class="card">
              <span class="sale-tag">Sale</span>
              <div class="cont-pic">
                <img class="card-pic" src="<?php echo $image ?>" alt="image of product" />
              </div>
              <span class="product-name"><?php
                 if(isset($cust_id)){
                   ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>&cust_id=<?php echo $cust_id ?>"><?php echo $name ?></a></span>
                   <?php
                 }else{
                  ?>
                    <a class="name-link" href="product.php?prod_id=<?php echo $prod_id ?>"><?php echo $name ?></a></span>
                  <?php
                 }
                  ?>
              <div class="price-tag">
                <p class="unit">Rs.</p>
                <span class="price"><?php echo $price ?></span>
              </div>
            </div>
            <?php
          }
          ?>
          </div>
          <a class="btn-show-more" href="#">Show More &rArr;</a>
        </section>
      </section>
      <section class="operations">
        <div class="operations__tab-container">
          <button
            class="operations__tab operations__tab--1 operations__tab--active"
            data-tab="1"
          >
            <span>01</span>Instant delivery
          </button>
          <button class="operations__tab operations__tab--2" data-tab="2">
            <span>02</span>Return policy
          </button>
          <button class="operations__tab operations__tab--3" data-tab="3">
            <span>03</span>No need for account
          </button>
        </div>
        <div
          class="operations__content operations__content--1 operations__content--active"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="operations__icon"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
            height="50"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
            />
          </svg>
          <h2 class="operations__header">
            Just place the order, and your order will be on its way
          </h2>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
            illum sequi! Enim, temporibus tempora rem illo dolor magnam? Non
            expedita labore et voluptates praesentium aspernatur eaque deserunt
            similique quasi eum?
          </p>
        </div>
        <div class="operations__content operations__content--2">
          <div class="operations__icon operations__icon--2"></div>
          <h5 class="operations__header">
            Any Problem in the order, you can return it within
            <span>3</span> days
          </h5>
          <p>
            Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat
            cupidatat non proident, sunt in culpa qui officia deserunt mollit
            anim id est laborum.
          </p>
        </div>
        <div class="operations__content operations__content--3">
          <div class="operations__icon operations__icon--3"></div>
          <h5 class="operations__header">
            No longer need your account? No problem! Close it instantly.
          </h5>
          <p>
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
            officia deserunt mollit anim id est laborum. Ut enim ad minim
            veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
            ea commodo consequat.
          </p>
        </div>
      </section>
    </main>

    <script src="js/script.js"></script>
  </body>
</html>

<?php
  require("include/footer.inc.php");
?>