<?php
    include "library/dbClass.php";
    include "library/lib.php";

    $data = array($_POST['real_name'], $_POST['uid'], $_POST['pwd'],
                    $_POST['phone_number'], $_POST['bank_account'],
                    $_POST['work_place'],$_POST['pay_by_time']);

    $query = "insert into members(real_name, uid, pwd, phone_number, bank_account, work_place, pay_by_time ) 
            values(?,?, password(?),?, ?, ?, ?)";

    $insert = $db-> query($query, $data);
    $cnt = $insert->affectedRows();
    
    if($cnt!=1){
        exit;
    }

    Header("Location: login.php");