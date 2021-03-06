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
  <title>Calculate wages | Auto Pay</title>
  <script
    src="https://kit.fontawesome.com/faa41a920e.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>   
  <?php
    session_start();
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
    <div class="proc_area__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <header class="proc_area__area__welcome">
      <?php
        //request user's work place
        $query = "select work_place from members where uid = ?";
        $list = $db -> query($query, $isLogin)-> fetchAll();
        foreach($list as $data){
            $work_place = $data['work_place'];
        }

        //request user's pay by time
        $query = "select pay_by_time from members where uid = ?";
        $list = $db -> query($query, $isLogin)-> fetchAll();
        foreach($list as $data){
            $pay_by_time = $data['pay_by_time'];
        }

        echo '<h1 class="proc_area__welcome__title">'.$isLogin.' 님의 임금 내역이예요</h1>';
        echo "<div class = proc_area__welcome_userinform>";
        echo '<h4>근무지 :'.$work_place.'</h4>';
        echo '<h4>시급 :'.$pay_by_time.'</h4>';
        echo "</div>"
      ?>
    </header>

    <form class = "proc_area__form" action="timeProc.php" method="post" >
        <input name = "date" type="date" id="date_select" min="2020-01-01" required>
        <select name="time_select" id="time_select" required>
          <option value="" selected>시간을 선택해 주세요</option>
          <?php 
            for($i=1; $i<=30; $i++)
              echo '<option value="'.$i.'">'.$i*0.5.'</option> ';
          ?>
        </select>
        <input id="request" type="submit" value = "임금 요청 하기">
    </form>

    <form action="timeDeleteProc.php" method = "post">
      <table>
        <tr>
          <td>날짜</td>
          <td>시간</td>
          <td>요청 시간</td>
          <td>승인여부</td>
          <td>임금</td>
          <td>삭제</td>
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
            <td> <?=$data['date']?></td>
            <td> <?=$data['time']?></td>
            <td> <?=$data['regdate']?></td>
            <td> <?=$data['permit']?></td>
            <td> <?=$data['pay']?></td>
            <td> 
              <input type="checkbox" name = "delete[]" value = "<?=$data['idx']?>">
            </td>
        
        <?php
          }
          echo '<div class = "proc_area__inform">
          <p class = "proc_area__inform-request">요청한 임금: '.$total.'</p>
          <p class = "proc_area__inform-permit">승인된 임금: '.$pay_total.'</p>
          </div>';
        ?>
      </table>
      <input type="submit" value = "삭제">
    </form>
  </div>

  <?php include "library/footer.php"; ?>

  <script src="src/nav.js"></script>
</body>
</html>