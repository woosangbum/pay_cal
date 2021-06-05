<?php
    session_start();
 
    unset($_SESSION['isLogin']);
    unset($_SESSION['isLoginManagers']);
    Header("Location: index.php");
?>