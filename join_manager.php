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
  ?>

  <main class = "contents-join_m">
    <div class="contents-join_m__logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class = "contents-join_m__area">
        <header class="contents-join_m__area__welcome">
          <h1>Welcome to Auto Pay</h1>
          <p>Are you managers?</p>
        </header>
  
        <form class = "contents-join_m__area__form" action="joinProc_manager.php" method="post">
          <p><label for = "name"> 가게 이름 <br>
            <input type="text" class = "contents-join_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "real_name" name = "name" autofocus required></label>
          </p>
  
          <p><label for = "uid"> 아이디 <br>
            <input type="text" class = "contents-join_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "uid" name = "uid" required ></label>
          </p>
  
  
          <p><label for = "pwd"> 비밀번호 <br>
            <input type="password" class = "contents-join_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required></label>
          </p>
  
          <p><label for = "phone_number"> 전화번호 <br>
            <input type="tel" class = "contents-join_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "phone_number" name = "phone_number" required></label>
          </p>
  
          <p><label for = "address"> 주소 <br>
            <input type="text" class = "contents-join_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "address" name = "address" required></label>
          </p>
  
          <input class = "contents-join_m__area__form-submit" type="submit" value="회원가입">
        </form>
    </div>
  </main>

  <?php 
    include "library/footer.php"; 
  ?>

  <script src="src/nav.js"></script> 
</body>
</html>