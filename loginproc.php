<?php
    session_start();
    $connect = mysqli_connect("localhost","root", "", "payment_members");

    $uid = $_POST["uid"];
    $pwd = $_POST["password"];
    $uid = mysqli_real_escape_string($connect, $uid);
    $pwd = mysqli_real_escape_string($connect, $pwd);
    
    $query = "select * from members where uid = '$uid' and pwd = password('$pwd')";
    $query_managers = "select * from managers where uid = '$uid' and pwd = password('$pwd')";
    
    $result = mysqli_query($connect, $query);
    $result_managers = mysqli_query($connect, $query_managers);
    
    $data = mysqli_fetch_array($result);
    $data_managers = mysqli_fetch_array($result_managers);
   

    if($data){
        $_SESSION["isLogin"] = $uid;
?>
    <script>
        location.href="realpage.php";
    </script>
<?php
    }elseif($data_managers){
        $_SESSION["isLoginManagers"] = $uid;
?>
    <script>
        location.href="realpage_managers.php";
    </script>
<?php
    }
    else{
?>
    <script>
        alert("로그인 정보가 올바르지 않습니다. ");    
        location.href="login.php";
    </script>
<?php
    }
?>
