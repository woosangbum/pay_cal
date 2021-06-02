<?php
  //if there is any login session, logout first
  session_start();
  unset($_SESSION['isLogin']);
  unset($_SESSION['isLoginManagers']);
?>