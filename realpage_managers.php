<?php
    session_start();
    $isLoginManagers = $_SESSION["isLoginManagers"];
    include "library/dbClass.php";
    include "library/lib.php";
    if(!$isLoginManagers){
        echo "사장님만 접근 가능합니다.";
        exit;
    }
?>
<!DOCTYPE html>
<html lang="eg">
  <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel= stylesheet href='CSS/style.css' type='text/css'>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="shortcut icon" href="image/paypal.png">
  <link
    href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap"
    rel="stylesheet"
  />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Calculate wages | Auto Pay</title>
    <script
      src="https://kit.fontawesome.com/faa41a920e.js"
      crossorigin="anonymous"
    ></script>
  </head>
<body>
    
<?php include "library/nav.php"; ?>

<form action="payProc.php" class = "proc_area" method="post">
    <table border = 1>
        <tr>
            <td>아이디</td>
            <td>날짜</td>
            <td>시간</td>
            <td>등록시간</td>
            <td>임금</td>
            <td>승인</td>
        </tr>
        <?php
        
        //나의 가게 직원들의 정보보기
        $query = "select name from managers where uid = '".$isLoginManagers."'";
        $result = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($result)){
            $place = $data[0];
        };
        
        
        $query = "select * from member_time where work_place = ? and permit = '대기'";
        $list = $db -> query($query, $place)-> fetchAll();
        foreach($list as $data){
        ?>
        <tr>
            <td> <?=$data['uid']?></td>
            <td> <?=$data['date']?></td>
            <td> <?=$data['time']?></td>
            <td> <?=$data['regdate']?></td>
            <td> <?=$data['pay']?></td>
            <td> 
              <input type="checkbox" name = "permit[]" value = "<?=$data['idx']?>">
            </td>
        
        <?php
        }
        ?>
    </table>
    <input type="submit" value = "승인">
</form>
<table border = 1>
        <tr>
            <td>아이디</td>
            <td>날짜</td>
            <td>시간</td>
            <td>등록시간</td>
            <td>임금</td>
        </tr>
        <?php
        
        //나의 가게 직원들의 정보보기
        $query = "select permit from member_time where work_place ='".$isLoginManagers."'and permit = '승인'";
        $result = mysqli_query($connect, $query);
        while($data = mysqli_fetch_array($result)){
            $place = $data[0];
        };
        
        
        $query = "select * from member_time where work_place = ?";
        $list = $db -> query($query, $place)-> fetchAll();

        $pay_total = 0;
        foreach($list as $data){
          if ($data['permit'] == '승인'){
            $pay_total += $data['pay'];
        }
        ?>
        <tr>
            <td> <?=$data['uid']?></td>
            <td> <?=$data['date']?></td>
            <td> <?=$data['time']?></td>
            <td> <?=$data['regdate']?></td>
            <td> <?=$data['pay']?></td>
        
        <?php
        }
        echo "임금 합계 :".$pay_total;
        ?>
</table>
</body>
</html>