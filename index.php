<!DOCTYPE html>
<html lang="eg">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel= stylesheet href='CSS/style.css' type='text/css'>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
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
  // show navbar to top 
  include "library/nav.php"; 
  ?>

  <header class="header_index">
    A new paradigm in wage calculation.
  </header>

  <main>
    <div class="contents_index">
      <div class="contents_index__logo">
        <i class="fab fa-paypal fa-10x"></i>
      </div>
      <div class="contents_index__welcome">Calculate wages</div>
      <div class="contents_index__ads_korean">
        <p>임금계산의 새로운 패러다임. 지금시작해보세요</p>
      </div>
      <div class="contents_index__ads_english">
        <p>A new paradigm in wage calculation. You can start now.</p>
      </div>
    </div>
    <?php
      //if user isn't logged in, show login and join btn
      if(!$isLogin and !$isLoginManagers ){ ?>
      <ul class="memebers_index">
        <li><a href="login.php">Login</a></li>
        <li id="join__main"><a href="join.php">Join</a></li>
        <li id="join__main"><a href="join_manager.php">사장님이신가요?</a></li>
      </ul>
    <?php }?>
  </main>

  <?php 
  // show footer to bottom
  include "library/footer.php"; 
  ?>
  <!-- for media query -->
  <script src="src/nav.js"></script>
</body>
</html>