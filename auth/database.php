<?php
    $con = mysqli_connect("localhost","root","","small_products");
    if(!$con){
        die("failse to connection". mysqli_connect_error());
    }
?>