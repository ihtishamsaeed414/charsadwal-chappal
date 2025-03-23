<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    $server_name = "localhost";
    $db_name = "charsadwalchappal";
    $db_server_username = "root";
    $db_server_pass = "";
    
    $connect = mysqli_connect($server_name,$db_server_username,$db_server_pass,$db_name);
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>