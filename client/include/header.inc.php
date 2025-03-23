<?php
    require("connection.inc.php");

    // // to avoid url redirection use condition
    // if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] != ""){
        
    // }else{
    //     header('location:login.php');
    //     die();
    // }
    
     
?>



<html>
  <head>
  </head>
  <body>
  <header class="header fixed-top">
      <div class="main-header">
        <div class="logo">𝕮𝖍𝖆𝖗𝖘𝖆𝖉𝖜𝖆𝖑<span class="--logo">𝕮𝖍𝖆𝖕𝖕𝖆𝖑</span></div>
        <div class="right-header">
          <div class="account-info">
            <div class="user-nav">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="cart-icon"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                />
              </svg>
              <?php
                if(isset($_GET['cust_id'])){
                  $cust_id = $_GET['cust_id'];
                  ?>
                     <a class="link-cart" href="index.php? cust_id=<?php echo $cust_id?>" target="_self">Home</a>
                  <?php
                }else{
                  ?>
                     <a class="link-cart" href="index.php" target="_self">Home</a>
                  <?php
                }
              ?>
             
            </div>
            <div class="user-nav">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="cart-icon"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                />
              </svg>
              <?php
               if(isset($_GET['cust_id'])){
                $cust_id = $_GET['cust_id'];
                  ?>
                     <a class="link-cart" href="cart.php? cust_id=<?php echo $cust_id?>" target="_self">Your Cart</a>
                  <?php
                }else{
                  ?>
                     <a class="link-cart" href="cart.php" target="_self">Your Cart</a>
                  <?php
                }
              ?>
              
            </div>
            <div class="user-nav">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="cart-icon"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"
                />
              </svg>
              <?php
                if(isset($_GET['cust_id'])){
                  $cust_id = $_GET['cust_id'];
                  ?>
                      <a class="link-orders" href="orders.php? cust_id=<?php echo $cust_id?>" target="_self"
                >Orders</a>
                  <?php
                }else{
                  ?>
                     <a class="link-orders" href="orders.php" target="_self"
                >Orders</a>
                  <?php
                }
              ?>
            </div>
            <div class="user-nav">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                class="cart-icon"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="2"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                />
              </svg>
              <a class="link-account" href="login.php" target="_self"
                >join Us</a
              >
            </div>
            <?php
                if(isset($_GET['cust_id'])){
                  $cust_id = $_GET['cust_id'];
                  ?>
                    <form method="post" action="logout.php">
                      <input class="logout-btn" type="submit" name="logoutbutton" value="Log Out">
                   </form>
                  <?php
                }
                ?>
            
          </div>
          <!-- <ul class="account-expand">
            <li class="list-item">Cart</li>
            <li class="list-item">setting</li>
            <li class="list-item">option</li>
            <li class="list-item">option</li>
            <li class="list-item">option</li>
          </ul> -->
        </div>
      </div>

      <!-- NAVIGAITON BAR  -->
      <nav class="main-nav">
        <ul class="nav">
          <li class="nav-item"><a href="http://localhost/CharsadwalChappal/client/index.php#cat-1">Kaptan Chappal</a></li>
          <li class="nav-item"><a href="http://localhost/CharsadwalChappal/client/index.php#cat-2">Peshawari Chappal</a></li>
          <li class="nav-item">
            <a href="#cat-3">Charsadwal Chappal</a>
          </li>
          <li class="nav-item"><a href="http://localhost/CharsadwalChappal/client/index.php#cat-3">Imran Khan Chappal</a></li>
          <li class="nav-item last-item"><a href="http://localhost/CharsadwalChappal/client/index.php#cat-sale">Sale</a></li>
        </ul>
        <div class="search">
          <input
            class="search-input"
            type="search"
            placeholder="Search in store"
          />
          <span
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              class="search-icon"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
              stroke-width="2"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"
              /></svg
          ></span>
        </div>
      </nav>
    </header>
  </body>
</html>