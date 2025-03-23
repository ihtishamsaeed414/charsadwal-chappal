<html>
    <head>
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
   
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous" defer></script>


        <style>
            .cantainer{
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                background: radial-gradient(ellipse at center, #b20101, #fb8701);
            }

            .form{
                background-color: #fff;
                padding: 2rem;
                border-radius: 10px;
            }
        </style>

    </head>
    <body>
      <div class="cantainer">
        <form class="form" method="post">
          <div class="form-outline mb-4">
            <input type="text" id="form2Example1" class="form-control" name="usernametextbox" required/>
            <label class="form-label" for="form2Example1" >Username</label>
          </div>

          <div class="form-outline mb-4">
            <input type="password" id="form2Example2" class="form-control" name="passwordtextbox" required/>
            <label class="form-label" for="form2Example2">Password</label>
          </div>

          <div class="row mb-4">
            <div class="col d-flex justify-content-center">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form2Example31" />
                <label class="form-check-label" for="form2Example31"> Remember me </label>
              </div>
            </div>

            <div class="col">
               <a href="#!">Forgot password?</a>
            </div>
          </div>

         <button type="submit" class="btn btn-primary btn-block mb-4" name="submitbutton" >Log In</button>
        </form>
</div>
    </body>
</html>


<?php
    require("include/connection.inc.php");
    require("include/functions.inc.php");

    if(isset($_POST['submitbutton'])){
        $username = check_validity($connect,$_POST['usernametextbox']);
        $password = check_validity($connect,$_POST['passwordtextbox']);
        
        $query = "SELECT * FROM admin WHERE admin_name = '$username' AND admin_password = '$password'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count > 0){
            $_SESSION['ADMIN_LOGIN'] = "yes";   // for logout or other pages to avoid url entry
            $_SESSION['ADMIN'] = $username;
            header('location:dashboard.php');
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
