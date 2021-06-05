<?php
    include "library/dbClass.php";
    session_start();
    $isLoginManagers = $_SESSION["isLoginManagers"];
    if(!$isLoginManagers){
    echo "사장님만 접근 가능합니다.";
    exit;
    }

    $pwd = $_POST["pwd"];
    $address = $_POST["address"];
    $phone_number  = $_POST["phone_number"];
    
    $query = "update managers set pwd=password('$pwd'), address = '$address', phone_number = '$phone_number' where uid= ?";
    echo $query;
    $update = $db -> query($query, $isLoginManagers);
    $cnt = $update->affectedRows();
    
    if($cnt!=1){
        echo "is in error, Back to previous page.";
        exit;
    }    

    echo "
        <script>
            location.href = 'index.php';
        </script>
	  ";
?>