<?php
include "library/dbClass.php";
include "library/lib.php";
session_start();
$isLoginManagers = $_SESSION["isLoginManagers"];
echo $isLoginManagers;

$query = "select name from managers where uid = ?";
            $list = $db -> query($query, $isLoginManagers)-> fetchAll();

            print_r($list[0]["name"]);
            
            echo "<br>";

$query = "select * from member_time where permit = '승인' and work_place = ?";
            $list = $db -> query($query, "StarBooks")-> fetchAll();
            print_r($list);
            echo "<br>";
?>