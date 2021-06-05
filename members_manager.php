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

        $query    = "select name from managers where uid= ?";
        $work_place = $db -> query($query, $isLoginManagers)-> fetchAll();
        $work_place = $work_place[0]["name"];
        
        $query    = "select * from members where work_place = ?";
        $members_inform = $db -> query($query, $work_place)-> fetchAll();

    ?>
    <main class = "contents-members">
        <div class="contents-members__logo">
            <i class="fab fa-paypal"></i>
        </div>
        <div class="contents-members__area">
        <header class="contents-members__area__welcome">
            <h1>THE <?=$work_place?></h1>
            <p>You can manage your members here!</p>
        </header>

        <form class = "contents-members__area__form" action="delete_member.php" method = "post">
            <table>
                <tr>
                    <td>이름</td>
                    <td>전화번호</td>
                    <td>계좌 번호</td>
                    <td>시급</td>
                    <td>삭제</td>
                </tr>
                <?php
                    for($i=0; $i<count($members_inform); $i++){
                ?>
                        <tr>
                            <td> <?=$members_inform[$i]["real_name"]?></td>
                            <td> <?=$members_inform[$i]["phone_number"]?></td>
                            <td> <?=$members_inform[$i]["bank_account"]?></td>
                            <td> <?=$members_inform[$i]["pay_by_time"]?></td>
                            <td> 
                                <input type="checkbox" name = "delete[]" value = "<?=$members_inform[$i]["idx"]?>">
                            </td>
                        </tr>
                <?php
                    }
                ?>
            </table>
            <input class = "sub-btn" type="submit" value = "삭제">
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

