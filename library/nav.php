<nav class="navbar">
  <div class="navbar__logo">
      <i class="fab fa-paypal"></i>
      <a href="index.php">Auto Pay</a>
  </div>    
  <?php
    session_start();
    $isLogin = $_SESSION["isLogin"];
    $isLoginManagers = $_SESSION["isLoginManagers"];
    if($isLogin){
    //if user is logged in, echo navbar below
  ?> 
  <ul class="navbar__linkList">
    <li><a href="index.php">Home</a></li>
    <li><a href="realpage.php">My Wages</a></li>
    <li><a href="#">FAQ</a></li>
  </ul>

  <ul class="navbar__members">
    <li><a href="modify.php">My Info</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
    
  <?php 
    }elseif($isLoginManagers){
    //if manager is logged in, echo navbar below
  ?>
  <ul class="navbar__linkList">
    <li><a href="index.php">Home</a></li>
    <li><a href="realpage_managers.php">Labor Costs</a></li>
    <li><a href="members_manager.php">My Members</a></li>
    <li><a href="#">FAQ</a></li>
  </ul>

  <ul class="navbar__members">
    <li><a href="modify_manager.php">My Info</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
      
  <?php 
    }else{
    //if there is no login session, echo navbar below
  ?>
  <ul class="navbar__linkList">
    <li><a href="index.php">Home</a></li>
    <li><a href="realpage.php">My Wages</a></li>
    <li><a href="#">FAQ</a></li>
  </ul>

  <ul class="navbar__members">
    <li><a href="login.php">Login</a></li>
    <li id="join"><a href="join.php">Join</a></li>
  </ul>
  <?php 
    }
  ?> 
  <a href="#" class = "navbar__toogleBtn">
    <i class="fas fa-bars"></i>
  </a>
</nav>