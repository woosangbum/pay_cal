<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="CSS/hub.css" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>임금계산을 자동으로 | 오토페이</title>
</head>
<body>
  <nav class="nav">
    <ul class="nav__list">
      <li class="nav__btn">
        <a class="nav__link" href="">
          마이페이지
        </a>
      </li>
      <li class="nav__btn" >
        <a class="nav__link" href="">
          마이페이지
        </a>
      </li>
      <li class="nav__btn">
        <a class="nav__link" href="">
          마이페이지
        </a>
      </li>
      <li class="nav__btn">
        <a class="nav__link" href="">
          마이페이지
        </a>
      </li>
    </ul>
  </nav>
  <div class = "main_image">
    
  </div>
<?php
  
  include "lib.php";

  session_start();

  $isLogin = $_SESSION["isLogin"];
  if(!$isLogin){
    ?>
    로그인후 이용해 주세요. <br>
    <a href = "login.php"> 로그인</a>

  <?php 
    }
?>
  
</body>
</html>