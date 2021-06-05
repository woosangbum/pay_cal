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
        $isLoginManagers = $_SESSION["isLoginManagers"];
        if(!$isLoginManagers){
          echo "사장님만 접근 가능합니다.";
          exit;
        }

        $query    = "select * from managers where uid= ?";
        $row = $db -> query($query, $isLoginManagers)-> fetchAll();

        $uid = $row[0]["uid"];
        $name = $row[0]["name"];
        $phone_number = $row[0]["phone_number"];
        $address = $row[0]["address"];

    ?>
    <main class = "contents-modify_m">
        <div class="contents-modify_m__logo">
        <i class="fab fa-paypal"></i>
        </div>
        <div class="contents-modify_m__area">
        <header class="contents-modify_m__area__welcome">
            <h1>My Infromation</h1>
            <p>You can change your account's infrom!</p>
        </header>

        <form class = "contents-modify_m__area__form" action="modify_managerProc.php" method="post">
            <table>
                <tr>
                    <td>가게 이름</td>
                    <td>아이디</td>
                    <td>전화번호</td>
                    <td>주소</td>
                </tr>
            <tr>
                <td> <?=$name?></td>
                <td> <?=$uid?></td>
                <td> <?=$phone_number?></td>
                <td> <?=$address?></td>
            </table>
            
            <div class = "contents-modify_m__area__form-box">
                <div>비밀번호 변경</div>
                <input type="password" class = "contents-modify_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "pwd" required>
            </div>


            <div class = "contents-modify_m__area__form-box">
                <div>전화번호 변경</div>
                <input type="tel" class = "contents-modify_m__area__form-text" autocapitalize = "off" autocomplete="off" id = "pwd" name = "phone_number" required>
            </div>

            <div class = "contents-modify_m__area__form-box">
                <div>주소 변경</div>
                <input type="text" class = "contents-modify_m__area__form-text" autocapitalize = "off" autocomplete="off" name = "address" required>
            </div>

            <input class = "contents-modify_m__area__form-submit" type="submit" value="정보 변경">
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

