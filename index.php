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
      <li><a href="realpage_managers.php">My Pages</a></li>
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

<header class="header-main">
  A new paradigm in wage calculation.
</header>
    <!-- contents is here -->
<div class="contents-main">
  <div class="contents-main__logo">
    <i class="fab fa-paypal fa-10x"></i>
  </div>
  <div class="contents-main__welcome">Calculate wages</div>
  <div class="contents-main__ads-korean">
    임금계산의 새로운 패러다임. 지금시작해보세요
  </div>
  <div class="contents-main__ads-english">
    A new paradigm in wage calculation. You can start now.
  </div>
</div>

<main>
<?php
  if(!$isLogin and !$isLoginManagers ){ ?>
  <ul class="navbar-login__main">
    <li><a href="login.php">Login</a></li>
    <li id="join__main"><a href="join.php">Join</a></li>
    <li id="join__main"><a href="join_manager.php">사장님이신가요?</a></li>
  </ul>
<?php }?>
</main>

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
</body>
</html>