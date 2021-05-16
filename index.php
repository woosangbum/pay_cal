<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
asdsadasdasdas
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