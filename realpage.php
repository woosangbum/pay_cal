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
    
<?php
  session_start();
  include "library/lib.php";
  include "library/dbClass.php";
  $isLogin = $_SESSION["isLogin"];
  $isLoginManagers = $_SESSION["isLoginManagers"];

  if(!$isLogin){
?>
  <script>
    location.href="login.php";
  </script>
<?php
  }
?>

<?php include "library/nav.php"; ?>
<div class = "proc_area">
    <foprm action="timeProc.hp" method="post">
        <input name = "date" type="date" placeholder="날짜">
        <select name="time_select" id="time_select">
            <option value="" selected>시간을 선택해 주세요</option>
            <?php 
              for($i=1; $i<=15; $i++)
                echo '<option value="'.$i.'">'.$i.'</option> ';
            ?>
        </select>
        <input type="submit" value = "저장">
    </foprm>
    <table border = 1>
        <tr>
            <td>아이디</td>
            <td>날짜</td>
            <td>시간</td>
            <td>등록시간</td>
            <td>승인여부</td>
            <td>임금</td>
        </tr>
        <?php
        $query = "select * from member_time where uid = ?";
        $list = $db -> query($query, $isLogin)-> fetchAll();
        $total = 0;
        $pay_total = 0;
        foreach($list as $data){
            $total += $data['pay'];
            if ($data['permit'] == '승인'){
                $pay_total += $data['pay'];
            }
        ?>
        <tr>
            <td> <?=$data['uid']?></td>
            <td> <?=$data['date']?></td>
            <td> <?=$data['time']?></td>
            <td> <?=$data['regdate']?></td>
            <td> <?=$data['permit']?></td>
            <td> <?=$data['pay']?></td>
        
        <?php
        }
        echo "요청한 임금: ".$total;
        echo "승인된 임금: ".$pay_total;
        
        ?>
    </table>
</div>
  <?php include "library/footer.php"; ?>
</body>
</html>