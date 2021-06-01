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
<?php include "library/nav.php"; ?>

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