<!DOCTYPE html>
<html lang="eg">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="CSS/style.css" type="text/css" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="shortcut icon" href="image/paypal.png" />
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
        
      
      

  <main class="main-login">
    <div class="loginPage-logo">
      <i class="fab fa-paypal"></i>
    </div>
    <div class="form-area">
      <header class="form-area__header-welcome">
        <h1 class="form-area__header-welcome__title">Log in to Auto Pay</h1>
        <p class="form-area__header-welcome__text">
          If you have Auto Pay Acoount, log in with your ID and Password.
        </p>
      </header>

      <form class="form-area__input" action="loginproc.php" method="post">
        <label for="form-area__input__login"
          >User ID
          <input class="form-area__input__text" type="text" name="uid" />
        </label>

        <label for="form-area__input__login"
          >Password
          <input
            class="form-area__input__text"
            type="password"
            name="password"
          />
        </label>

        <input
          class="form-area__input__submit"
          type="submit"
          value="Log In"
        />
      </form>
    </div>
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
    </ul>
  </footer>
  </body>
</html>
