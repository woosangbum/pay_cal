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