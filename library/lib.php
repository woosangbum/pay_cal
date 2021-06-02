<?php
    error_reporting(1);
    ini_set("display_errors",1);

    $connect = mysqli_connect("localhost","root", "", "payment_members");
    if(mysqli_connect_error()){
        echo "conneting mysql, Error";
        echo mysqli_connect_error();
    }
?>