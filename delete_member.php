<?php
    session_start();
    $isLogin = $_SESSION["isLogin"];
    $isLoginManagers = $_SESSION["isLoginManagers"];
    include "library/dbClass.php";

    for ($i = 0; $i<count($_POST["delete"]); $i++){
        $query = "delete from members where idx = ?";
        $db -> query($query, $_POST["delete"][$i]);
    }

    if($isLogin){
        header("Location: realpage.php");
    }elseif($isLoginManagers){
        header("Location: members_manager.php");
    }
?>