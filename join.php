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
    //로그인이 되어 있다면, 로그아웃 시킨다.
    include "library/lib.php";

    session_start();

    $isLogin = $_SESSION["isLogin"];
    $isLoginManagers = $_SESSION["isLoginManagers"];
    if($isLogin){
      //로그인이 되어 있을때
      unset($_SESSION['isLogin']);
    }elseif($isLoginManagers){
      //사장님이 로그인 했을 때
      unset($_SESSION['isLoginManagers']);
    }  
?>
   <!-- navbar is here -->
  <nav class="navbar-login">
    <div class="navbar-login__logo">
        <i class="fab fa-paypal"></i>
        <a href="index.php">Auto Pay</a>
      </div>
      <ul class="navbar-login__linkList">
        <li><a href="index.php">Home</a></li>
        <li><a href="realpage.php">My Wages</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>

      <ul class="navbar-login__members">
        <li><a href="login.php">Login</a></li>
        <li id="join"><a href="join.php">Join</a></li>
      </ul>
  </nav>
<?php
    $query = "select name from managers";
    $result = mysqli_query($connect, $query);
    while($data = mysqli_fetch_array($result)){
        $m_list[] = $data[0];
    };
?>

  <main class = "main-join">
    <div class="main-join__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class="main-join__area">
      <header class="main-join__area__welcome">
          <h1 class="join__area__welcome__title">Welcome to Auto Pay</h1>
          <p class="join__area__welcome__text">Create your account</p>
          <div class = "join__area__welcome__manager">
            <a href="join_manager.php">사장님이신가요?</a>
          </div>
      </header>

      <form class = "main-join__area__form" action="joinProc.php" method="post" onsubmit="return chkFrm();">
          <p><label for = "real_name"> 이름 <br>
              <input type="text" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "real_name" name = "real_name" autofocus required></label>
          </p>

          <p><label for = "uid"> 아이디 <br>
              <input type="text" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "uid" name = "uid" required ></label>
          </p>


          <p><label for = "pwd"> 비밀번호 <br>
              <input type="password" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required></label>
          </p>

          <p><label for = "phone_number"> 전화번호 <br>
              <input type="tel" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "phone_number" name = "phone_number" ></label>
          </p>

          <p><label for = "bank_account"> 입금 계좌 <br>
              <input type="text" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "bank_account" name = "bank_account" ></label>
          </p>

          <p><label for = "work_place"> 근무지 <br>
              <select name="work_place" id="work_place">
                  <option value="" selected>선택해주세요</option>
                  <?php
                  foreach($m_list as $val){
                      echo "<option value=".$val.">$val</option>";
                  }?>
              </select>
          </p>

          <p><label for = "pay_by_time"> 시급 <br>
              <input type="text" class = "main-join__area__form-text" autocapitalize = "off" autocomplete="off" id = "pay_by_time" name = "pay_by_time" ></label>
          </p>

          <input class = "main-join__area__form-submit" type="submit" value="회원가입">
      </form>
    </div>
    <?php include "library/footer.php"; ?>
  </main>
</body>
</html>