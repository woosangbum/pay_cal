<?php
  session_start();
  $isLoginManagers = $_SESSION["isLoginManagers"];
  include "library/dbClass.php";
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
  <title>Calculate wages | Auto Pay</title>
  <script
    src="https://kit.fontawesome.com/faa41a920e.js"
    crossorigin="anonymous"
  ></script>
</head>
<body>
    
  <?php 
    include "library/nav.php"; 
  ?>

  <div class = "proc_area_m">
    <div class="proc_area_m__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <header class="proc_area__area_m__welcome">
      <?php        
        $query = "select name from managers where uid = ?";
        $list = $db -> query($query, $isLoginManagers)-> fetchAll();
        foreach($list as $data){
          $work_name = $data['name'];
        }

        echo '<h1 class="proc_area_m__welcome__title">'.$isLoginManagers.' 님의 인건비 기록이예요</h1>';
        echo "<div class = proc_area__welcome_userinform>";
        echo '<h4>나의 가게 :'.$work_name.'</h4>';
        echo "</div>"
      ?>
    </header>

    <form action="payProc.php" class = "proc_area_m_form" method="post">
      <?php
      //get the my place name from database
      $query = "select name from managers where uid = ?";
      $my_place = $db -> query($query, $isLoginManagers)-> fetchAll();
      $my_place = $my_place[0]["name"];
      
      // show current permit infrom from database
      $query = "select * from member_time where work_place = ? and permit = '대기'";
      $list = $db -> query($query, $my_place)-> fetchAll();

      if(!count($list)){ 
        echo "<div>요청된 임금 목록이 없습니다</div>";
      }else{
      ?>
      <table>
      <caption>임금 요청</caption>
        <tr>
            <td>이름</td>
            <td>날짜</td>
            <td>시간</td>
            <td>등록시간</td>
            <td>임금</td>
            <td>승인</td>
        </tr>
        <?php
          foreach($list as $data){
        ?>
        <tr>
          <td> <?=$data['real_name']?></td>
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
        <?php
          }
        ?>
    </form>

    <form action="timeDeleteProc.php" method = "post">
      <div class= "proc_area_m_log">
        <table>
          <tr>
              <td>이름</td>
              <td>날짜</td>
              <td>시간</td>
              <td>등록시간</td>
              <td>임금</td>
              <td>삭제</td>
          </tr>
          <?php
            $query = "select * from member_time where permit = '승인' and work_place = ?";
            $list = $db -> query($query, $my_place)-> fetchAll();

            $pay_total = 0;

            // show the 6, recent contents
            if(count($list) >7)
              $list = array_slice($list,-6,6);
            
            foreach($list as $data){
              if ($data['permit'] == '승인'){
                $pay_total += $data['pay'];
          ?>
            <tr>
              <td> <?=$data['real_name']?></td>
              <td> <?=$data['date']?></td>
              <td> <?=$data['time']?></td>
              <td> <?=$data['regdate']?></td>
              <td> <?=number_format($data['pay'])?></td>
              <td> 
                <input type="checkbox" name = "delete[]" value = "<?=$data['idx']?>">
              </td>
            <?php
              }
            }
          echo '<div class = "proc_area_m__inform">
                <p class = "proc_area_m__inform-log">인건비 총합: '.number_format($pay_total).'원</p>
                </div>';
            ?>
        </table>
        <input type="submit" value = "삭제">
      </div>
    </form>

    <h3>Each Members</h3>
    <div class = "each_member-pay">
      <?php
        //직원 리스트 받기
        $query = "select real_name from members where work_place = ?";
        $list_name = $db -> query($query, $my_place)-> fetchAll();
        

        for ($i=0; $i<count($list_name); $i++){
          //각 직원별 인건비 합계
          $query = "select pay from member_time where permit = '승인' and real_name = ?";
          $list_pay = $db -> query($query, $list_name[$i]["real_name"])-> fetchAll();
        
          $pay_member = 0;
          for ($j=0; $j<count($list_pay); $j++){
            $pay_member += $list_pay[$j]["pay"];
          }

          echo '<p>'.$list_name[$i]["real_name"].': '.number_format($pay_member).' 원</p>';
        }
        ?>
    </div>
  </div>

  <?php 
    include "library/footer.php"; 
  ?>

  <script src="src/nav.js"></script>
</body>
</html>