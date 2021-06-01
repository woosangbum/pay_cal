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
  <nav class="navbar">
    <div class="navbar__logo">
        <i class="fab fa-paypal"></i>
        <a href="index.php">Auto Pay</a>
      </div>
      <ul class="navbar__linkList">
        <li><a href="index.php">Home</a></li>
        <li><a href="realpage.php">My Wages</a></li>
        <li><a href="#">FAQ</a></li>
      </ul>

      <ul class="navbar__members">
        <li><a href="login.php">Login</a></li>
        <li id="join"><a href="join.php">Join</a></li>
      </ul>
      <a href="#" class = "navbar__toogleBtn">
        <i class="fas fa-bars"></i>
     </a>
  </nav>