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
    include "library/nav_out.php";
    include "library/nav.php";
    include "library/lib.php";

    // request work place list
    $query = "select name from managers";
    $result = mysqli_query($connect, $query);
    while($data = mysqli_fetch_array($result)){
      $m_list[] = $data[0];
    };
  ?>

  <main class = "contents-join">
    <div class="contents-join__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class="contents-join__area">
      <header class="contents-join__area__welcome">
          <h1>Welcome to Auto Pay</h1>
          <p>Create your account</p>
          <div class = "contents-join__area__welcome__manager">
            <a href="join_manager.php">사장님이신가요?</a>
          </div>
      </header>

      <form class = "contents-join__area__form" action="joinProc.php" method="post">
        <p><label for = "real_name"> 이름 <br>
          <input type="text" class = "contents-join__area__form-text" id = "real_name" autocapitalize = "off" autocomplete="off"  name = "real_name" autofocus required></label>
        </p>

        <p><label for = "uid"> 아이디 <br>
          <input type="text" class = "contents-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "uid" name = "uid" required ></label>
        </p>

        <p><label for = "pwd"> 비밀번호 <br>
          <input type="password" class = "contents-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required></label>
        </p>

        <p><label for = "phone_number"> 전화번호 <br>
          <input type="tel" class = "contents-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "phone_number" name = "phone_number"required ></label>
        </p>

        <p><label for = "bank_account"> 입금 계좌 <br>
          <input type="text" class = "contents-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "bank_account" name = "bank_account" required></label>
        </p>

        <p><label for = "work_place"> 근무지 <br>
          <select name="work_place" id="showWorkPlace">
            <option value="" selected>선택해주세요</option>
            <?php
            foreach($m_list as $val){
                echo "<option value=".$val.">$val</option>";
            }?>
          </select>
        </p>

        <p><label for = "pay_by_time"> 시급 <br>
          <input type="text" class = "contents-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "pay_by_time" name = "pay_by_time" ></label>
        </p>

        <input class = "contents-join__area__form-submit" type="submit" value="회원가입">
      </form>
    </div>
  </main>
  <script src="src/nav.js"></script>

  <?php 
    include "library/footer.php"; 
  ?>
</body>
</html>