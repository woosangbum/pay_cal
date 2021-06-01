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

<main class = "main-join_m">
<div class="main-join_m__logo">
      <i class="fab fa-paypal"></i>
    </div>
  <div class = "main-join__area_m">
      <header class="main-join__area_m__welcome">
          <h1 class="join__area_m__welcome__title">Welcome to Auto Pay</h1>
          <p class="join__area_m__welcome__text">Are you managers?</p>
      </header>
  
      <form class = "main-join__area_m__form" action="joinProc_manager.php" method="post" onsubmit="return chkFrm();">
          <p><label for = "name"> 가게 이름 <br>
              <input type="text" class = "main-join__area_m__form-text" autocapitalize = "off" autocomplete="off" id = "real_name" name = "name" autofocus required></label>
          </p>
  
          <p><label for = "uid"> 아이디 <br>
              <input type="text" class = "main-join__area_m__form-text" autocapitalize = "off" autocomplete="off" id = "uid" name = "uid" required ></label>
          </p>
  
  
          <p><label for = "pwd"> 비밀번호 <br>
              <input type="password" class = "main-join__area_m__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required></label>
          </p>
  
          <p><label for = "phone_number"> 전화번호 <br>
              <input type="tel" class = "main-join__area_m__form-text" autocapitalize = "off" autocomplete="off" id = "phone_number" name = "phone_number" ></label>
          </p>
  
          <p><label for = "address"> 주소 <br>
              <input type="text" class = "main-join__area_m__form-text" autocapitalize = "off" autocomplete="off" id = "address" name = "address" ></label>
          </p>
  
          <input class = "main-join__area_m__form-submit" type="submit" value="회원가입">
      </form>
  </div>
  <footer>
      <ul class="navbar-login__sns">
        <li>
          <i class="fab fa-instagram fa-1g"></i>
          <a href="https://www.instagram.com/">Instagram</a>
        </li>
        <li>
          <i class="fab fa-twitter fa-1g"></i>
          <a href="https://twitter.com/?lang=ko">twitter</a>
        </li>
        <li>
        <i class="far fa-envelope-open"></i>
          woosb24@gmial.com
        </li>
      </ul>
    </footer>
</main>
</body>
</html>