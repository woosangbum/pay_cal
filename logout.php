<?php
    session_start();
    include "library/lib.php";
 
    unset($_SESSION['isLogin']);
    unset($_SESSION['isLoginManagers']);
    Header("Location: index.php");
?>