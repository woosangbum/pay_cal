<?php
    session_start();
    $isLogin = $_SESSION["isLogin"];
    include "lib.php";
    if(!$isLogin){
        echo "회원만 접근 가능합니다.";
        exit;
    }
?>
<a href="logout.php">로그아웃</a>
gooddddddddddddddddd