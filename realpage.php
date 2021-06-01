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

  <nav class="navbar-login">
  <div class="navbar-login__logo">
      <i class="fab fa-paypal"></i>
      <a href="index.php">Auto Pay</a>
    </div>
      

      

<?php 
  if($isLogin){
    //로그인이 되어 있을때
?> 
    <ul class="navbar-login__linkList">
      <li><a href="index.php">Home</a></li>
      <li><a href="realpage.php">My Wages</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>

    <ul class="navbar-login__members">
      <li><a href="logout.php">Logout</a></li>
    </ul>
    
<?php 
  }elseif($isLoginManagers){
    //사장님이 로그인 했을 때
?>
    <ul class="navbar-login__linkList">
      <li><a href="index.php">Home</a></li>
      <li><a href="realpage.php">My Pages</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>

    <ul class="navbar-login__members">
      <li><a href="logout.php">Logout</a></li>
    </ul>
      
<?php 
  }else{
    //로그인이 되어 있지 않을 때
?>
    <ul class="navbar-login__linkList">
      <li><a href="index.php">Home</a></li>
      <li><a href="realpage.php">My Wages</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>

    <ul class="navbar-login__members">
      <li><a href="login.php">Login</a></li>
      <li id="join"><a href="join.php">Join</a></li>
    </ul>
<?php }?> 
</nav>
<div class = "proc_area">
    <form action="timeProc.php" method="post">
        <input name = "date" type="date" placeholder="날짜">
        <select name="time_select" id="time_select">
            <option value="" selected>시간을 선택해 주세요</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
        </select>
        <input type="submit" value = "저장">
    </form>
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
</body>
</html>