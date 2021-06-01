<?php
    include "library/dbClass.php";
    
    $data = array($_POST['name'], $_POST['uid'], $_POST['pwd'], 
                    $_POST['phone_number'], $_POST['address']);
    print_r($data);

    $query = "insert into managers(name, uid, pwd, phone_number, address) 
            values(?,?, password(?),?, ?)";

    // 가게이름에 따라 데이터 베이스 생성할 것.
    $insert = $db-> query($query, $data);
    $cnt = $insert->affectedRows();
    
    if($cnt!=1){
        exit;
    }

    Header("Location: index.php");