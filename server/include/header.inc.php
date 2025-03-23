<?php
    require("connection.inc.php");

    // to avoid url redirection use condition
    if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN'] != ""){
        
    }else{
        header('location:login.php');
        die();
    }
?>

<html>
        <body>
            <header>
            <div class="main-header">
               <div class="logo">𝕮𝖍𝖆𝖗𝖘𝖆𝖉𝖜𝖆𝖑<span class="--logo">𝕮𝖍𝖆𝖕𝖕𝖆𝖑</span></div>
               <div class="account-info">
                <form method="post" action="logout.php">
                 <input class="logout-btn" type="submit" name="logoutbutton" value="Log Out">
                </form>
            </div>
            </header>
        </body>
</html>



