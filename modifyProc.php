<?php 
    include "library/dbClass.php";
    session_start();
    $isLogin = $_SESSION["isLogin"];
    if(!$isLogin){
    echo "사장님만 접근 가능합니다.";
    exit;
    }

    $pwd = $_POST["pwd"];
    $bank_account = $_POST["bank_account"];
    $phone_number  = $_POST["phone_number"];
    $pay_by_time  = $_POST["pay_by_time"];
    
    $query = "update members set pwd=password('$pwd'), bank_account = '$bank_account', 
            phone_number = '$phone_number',pay_by_time = '$pay_by_time' 
            where uid= ?";
            
    $update = $db -> query($query, $isLogin);
    $cnt = $update->affectedRows();
    
    if($cnt!=1){
        echo "is in error, back to previous page.";
        exit;
    }   

    echo "
        <script>
            location.href = 'index.php';
        </script>
	  ";
?>