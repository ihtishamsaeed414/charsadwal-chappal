<?php
    function pr($arr){
        echo "<pre>";
        print_r($arr);
    }

    function prx($arr){
        echo "<pre>";
        print_r();
        die();
        
    }

    // validity code
    function check_validity($connect,$str){
        return mysqli_real_escape_string($connect,$str);
    }






















?>