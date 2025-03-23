
<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");

    if(isset($_POST['submitbtn'])){
        $contact = check_validity($connect,$_POST['contacttextbox']);
        $password = check_validity($connect,$_POST['passwordtextbox']);
        
        $query = "SELECT customer_id FROM customer WHERE customer_contact = '$contact' AND customer_password = '$password'";
        $execute = mysqli_query($connect,$query);
        $result = mysqli_fetch_array($execute);
        if(isset($result['customer_id']))
          $cust_id = $result['customer_id'];

        $count = mysqli_num_rows($execute);
        if($count > 0){
            // $_SESSION['USER_LOGIN'] = "yes";   // for logout or other pages to avoid url entry
            $_SESSION['USER'] = $contact;
            if(isset($cust_id))
              header('location:index.php?cust_id='.$cust_id.'');
            else
              header('location:index.php');
            die();
        }else{
            ?>
              <script>
                window.alert("Please provide the correct credentials")
              </script>
            <?php
        }
    }
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
    <link rel="stylesheet" href="css/login.css" />

    <title>Login</title>
  </head>
  <body class="body">
    <div class="modal">
      <div class="modal-container grid grid-cols-2">
        <div class="modal-left">
          <div>
            <h4 class="modal__header">Buy chappals <br />that you love</h4>
            <p class="modal-para">
              Create Account and get <br /><span>30% off</span> on first order
            </p>

            <div class="btns">
              <button class="btn-login btn-login-left">Sign In</button>
              <button class="btn-signup btn-signup-left">Sign Up</button>
            </div>
          </div>
        </div>
        <div class="modal-right">
          <div class="sign-in-container">
            <h2 class="modal__header--right">Welcome Back :)</h2>
            <p class="modal-para">To avial the best deals please login 🙂</p>
            <form action="" method="post" class="sign-in__form">
              <div class="form-container">
                <label for="contact">Contact Number</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </span>
                  <input
                    id="contact"
                    class="form-input"
                    type="text"
                    name="contacttextbox"
                    required
                    placeholder="03*******"
                  />
                </div>
              </div>
              <div class="form-container">
                <label for="password">Your password</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                      />
                    </svg>
                  </span>
                  <input
                    id="password"
                    class="form-input"
                    type="password"
                    name="passwordtextbox"
                    required
                    placeholder="Password"
                  />
                </div>
              </div>
              <div class="additionals">
                <div class="remember-me">
                  <input type="checkbox" name="rememberme" id="check" />
                  <label for="check">Remember me</label>
                </div>
                <div><a id="forgot-password" href="#">Forgot password?</a></div>
              </div>
              <button class="btn-login" name="submitbtn">Sign In</button>
            </form>
            
          </div>
          <div class="sign-up-container hidden-cont">
            <h2 class="modal__header--right">Greetings 🎉</h2>

            <form action="" method="post" class="sign-up__form">
              <div class="form-container">
                <label for="username">Full Name</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </span>
                  <input
                    id="username"
                    class="form-input"
                    type="text"
                    required
                    placeholder="Kamran Ali"
                  />
                </div>
              </div>
              <div class="form-container">
                <label for="contact-sign-in">Contact Number</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                      />
                    </svg>
                  </span>
                  <input
                    id="contact-sign-in"
                    class="form-input"
                    type="text"
                    required
                    placeholder="03*******"
                  />
                </div>
              </div>
              <div class="form-container">
                <label for="create-password">Create password</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                      />
                    </svg>
                  </span>
                  <input
                    id="create-password"
                    class="form-input"
                    type="password"
                    required
                    placeholder="Password"
                  />
                </div>
              </div>
              <div class="form-container">
                <label for="confirm-password">Confirm password</label>
                <div class="input-container">
                  <span class="icon-cont">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="form-icon"
                      width="25"
                      height="25"
                      fill="none"
                      viewBox="0 0 24 24"
                      stroke="currentColor"
                      stroke-width="2"
                    >
                      <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"
                      />
                    </svg>
                  </span>
                  <input
                    id="confirm-password"
                    class="form-input"
                    type="password"
                    required
                    placeholder="Password"
                  />
                </div>
              </div>
              <button class="btn-signup">Sign Up</button>
            </form>
            <div class="sign-up__options">
              ----------- <span>OR</span> ------------
              <div class="logos">
                <img src="assets/logos/fb-logo.png" alt="facebook logo" />
                <img src="assets/logos/g-logo.png" alt="google logo" />
                <img src="assets/logos/t-logo.png" alt="twitter logo" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="js/login.js"></script>
  </body>
</html>
