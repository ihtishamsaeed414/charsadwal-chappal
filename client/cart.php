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

    <title>Product</title>
  </head>
  <body>

    <main>
      <div class="headings-cart">
        <h2 class="heading-cart">Products</h2>
        <h2 class="heading-cart">Price</h2>
        <h2 class="heading-cart">Quantity</h2>
        <h2 class="heading-cart">Total Amount</h2>
      </div>
      
      <?php
      include("include/connection.inc.php");
      $get_cart_query= "SELECT * FROM product WHERE product_id =  '$prod_id'";

      $result = mysqli_query($connect, $get_cart_query);
    
      while($row = mysqli_fetch_assoc($result)){
        $name = $row['product_name'];
        $price = $row['product_price'];
        $image = "../server/" .$row['main_image'];
        $img_1 = "../server/" .$row['image_1'];
        $img_2 = "../server/" .$row['image_2'];
        $img_3 = "../server/" .$row['image_3'];
        $img_4 = "../server/" .$row['image_4'];
      }
       ?>

      <div class="cart">
        <div class="cart-item">
          <div class="img-cont">
            <img src="images/chappal.png" alt="product image" />
          </div>

          <span class="price">2999</span>
          <div class="quantity-cont quantity-m">
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
          <span class="total-price">2400</span>
          <span class="cart-icon-cont"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              class="cart-remove-icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              /></svg
          ></span>
        </div>
      </div>
      <div class="cart">
        <div class="cart-item">
          <div class="img-cont">
            <img src="images/chappal-5.jpg" alt="product image" />
          </div>

          <span class="price">3999</span>
          <div class="quantity-cont quantity-m">
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
          <span class="total-price">2400</span>
          <span class="cart-icon-cont"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              class="cart-remove-icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
              /></svg
          ></span>
        </div>
      </div>

      <div class="checkout-btn-cont">
        <button class="btn-ctn btn-buy-now btn-checkout">Checkout</button>
      </div>
    </main>
    <script src="js/cart.js"></script>
  </body>
</html>

<?php
  require("include/footer.inc.php");
?>