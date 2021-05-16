<?php
    session_start();
    include "lib.php";

    $email = $_POST["email"];
    $pwd = $_POST["password"];

    $email = mysqli_real_escape_string($connect, $email);
    $pwd = mysqli_real_escape_string($connect, $pwd);
    
    $query = "select * from members where email = '$email' and pwd = password('$pwd')";
    $result = mysqli_query($connect, $query);
    $data = mysqli_fetch_array($result);

    if($data){
        $_SESSION["isLogin"] = time();
        echo $_SESSION["isLogin"];
        var_dump($_SESSION);
?>
    <script>
        location.href="realpage.php";
    </script>
<?php
    }else{
        echo "로그인 정보가 올바르지 않습니다.";
    }
?>
