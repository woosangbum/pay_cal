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
 
<!-- navbar is here -->
<nav class="navbar-login">
  <div class="navbar-login__logo">
      <i class="fab fa-paypal"></i>
      <a href="index.php">Auto Pay</a>
    </div>
      
<?php
  include "library/lib.php";

  session_start();

  $isLogin = $_SESSION["isLogin"];
  $isLoginManagers = $_SESSION["isLoginManagers"];
  if($isLogin){
    //로그인이 되어 있을때?> 
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
    //사장님이 로그인 했을 때?>
    <ul class="navbar-login__linkList">
      <li><a href="index.php">Home</a></li>
      <li><a href="realpage_manager.php">My Pages</a></li>
      <li><a href="#">FAQ</a></li>
    </ul>

    <ul class="navbar-login__members">
      <li><a href="logout.php">Logout</a></li>
    </ul>
      
    <?php 
      }else{
    //로그인이 되어 있지 않을 때?>
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
<div class = "input__join">
    <header class="welcome-header">
        <h1 class="welcome-header__title">Welcome to Auto Pay</h1>
        <p class="welcome-header__text">Create your account</p>
    </header>

    <form class = "form_area" action="joinProc_manager.php" method="post" onsubmit="return chkFrm();">
        <p><label for = "name"> 가게 이름 <br>
            <input type="text" class = "input__box" autocapitalize = "off" autocomplete="off" id = "real_name" name = "name" autofocus required></label>
        </p>

        <p><label for = "uid"> 아이디 <br>
            <input type="text" class = "input__box" autocapitalize = "off" autocomplete="off" id = "uid" name = "uid" required ></label>
        </p>


        <p><label for = "pwd"> 비밀번호 <br>
            <input type="password" class = "input__box" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required></label>
        </p>

        <p><label for = "phone_number"> 전화번호 <br>
            <input type="tel" class = "input__box" autocapitalize = "off" autocomplete="off" id = "phone_number" name = "phone_number" ></label>
        </p>

        <p><label for = "address"> 주소 <br>
            <input type="text" class = "input__box" autocapitalize = "off" autocomplete="off" id = "address" name = "address" ></label>
        </p>



        <input class = "submit_btn" type="submit" value="회원가입">
    </form>
</div>
</body>
</html>