<?php
    session_start();
    unset($_SESSION['USER_LOGIN']);
    unset($_SESSION['USER']);
    header('location:login.php');
    die();
?>