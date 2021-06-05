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
        include "library/nav.php"; 
        include "library/dbClass.php";
        session_start();
        $isLogin = $_SESSION["isLogin"];
        if(!$isLogin){
            echo "
            <script>
                location.href = 'login.php';
            </script>
          ";
        }

        $query    = "select * from members where uid= ?";
        $row = $db -> query($query, $isLogin)-> fetchAll();

        $uid = $row[0]["uid"];
        $name = $row[0]["real_name"];
        $phone_number = $row[0]["phone_number"];
        $bank_account = $row[0]["bank_account"];
        $pay_by_time = $row[0]["pay_by_time"];
    ?>
    <main class = "contents-modify">
        <div class="contents-modify__logo">
        <i class="fab fa-paypal"></i>
        </div>
        <div class="contents-modify__area">
        <header class="contents-modify__area__welcome">
            <h1>My Infromation</h1>
            <p>You can change your account's infrom!</p>
        </header>

        <table>
            <tr>
                <td>이름</td>
                <td>아이디</td>
                <td>전화번호</td>
                <td>계좌 번호</td>
                <td>시급</td>
            </tr>
        <tr>
            <td> <?=$name?></td>
            <td> <?=$uid?></td>
            <td> <?=$phone_number?></td>
            <td> <?=$bank_account?></td>
            <td> <?=$pay_by_time?></td>
        </table>
        <form class = "contents-modify__area__form" action="modifyProc.php" method="post">
            
            <div class = "contents-modify__area__form-box">
                <div>비밀번호 변경</div>
                <input type="password" class = "contents-modify__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required>
            </div>


            <div class = "contents-modify__area__form-box">
                <div>전화번호 변경</div>
                <input type="tel" class = "contents-modify__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "phone_number" required>
            </div>

            <div class = "contents-modify__area__form-box">
                <div>계좌 번호 변경</div>
                <input type="text" class = "contents-modify__area__form-text" autocapitalize = "off" autocomplete="off" name = "bank_account" required>
            </div>

            <div class = "contents-modify__area__form-box">
                <div>시급 정보 변경</div>
                <input type="text" class = "contents-modify__area__form-text" autocapitalize = "off" autocomplete="off" name = "pay_by_time" required>
            </div>

            <input class = "contents-modify__area__form-submit" type="submit" value="정보변경">
        </form>
        </div>
    </main>
	<?php 
        // show footer to bottom
        include "library/footer.php"; 
        ?>
    <!-- for media query -->
    <script src="src/nav.js"></script>
</body>
</html>

