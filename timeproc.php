<?php
    session_start();
    include "library/dbClass.php";   
    include "library/lib.php";

    if(!isset($_SESSION["isLogin"])){
        echo "로그인 후 이용해주세요.";
        exit;
    }

    $isLogin = $_SESSION["isLogin"];
    
    $data[] = $_SESSION['isLogin'];
    $data[] = $_POST['date'];
    $data[] = $_POST['time_select'];
    $data[] = date("Y-m-d H:i:s");

    $query = "select work_place from members where uid = ?";
    $list = $db -> query($query, $isLogin)-> fetchAll();
    foreach($list as $place){
        $data[] = $place['work_place'];
    }

    $query = "select pay_by_time from members where uid = ?";
        $list = $db -> query($query, $isLogin)-> fetchAll();
        foreach($list as $pay_data){
            $pay = $pay_data['pay_by_time'];
        } // $pay에 시급을 저장
    
    $data[] = $data[2]*$pay;
    $query = "insert into member_time(uid, date, time, regdate, work_place,pay) values(?,?,?,?,?,?)";
    $db->query($query, $data);

    header("Location: realpage.php");
?>