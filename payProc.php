<?php
    session_start();
    $isLoginManagers = $_SESSION["isLoginManagers"];
    include "library/dbClass.php";
    if(!$isLoginManagers){
        echo "사장님만 접근 가능합니다.";
        exit;
    }


    for ($i = 0; $i<count($_POST["permit"]); $i++){
        $query = "update member_time set permit = '승인' where idx = ?";
        $db -> query($query, $_POST["permit"][$i]);
    }
    

    header("Location: realpage_managers.php");
?>