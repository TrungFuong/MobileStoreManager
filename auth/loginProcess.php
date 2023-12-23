<?php
session_start();
if (!isset($_POST['submit'])) {
    header("Location: login.php");
    die();
}
$name = $_POST['name'];
$pw = $_POST['PASSWORD'];
// var_dump($email, $pw);

require_once("../dBConnect.php");
$pwmd5 = md5($pw);
$sql = "SELECT * FROM admin WHERE name='$name'AND password='$pwmd5' LIMIT 1";
var_dump($sql);
$rs = mysqli_query($conn, $sql);

if (mysqli_num_rows($rs) == 0) {

    // Thất bại: 
    // Quay về trang login -> hiển thị thêm lỗi
    $_SESSION['msg'] = "Wrong email or Password";
    header("Location:../auth/login.php");
    echo "Thu lai!";
    die();
} else {

    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    }

    $_SESSION['isLoginSuccess'] = true;
    $user = mysqli_fetch_assoc($rs);
    $_SESSION['userName'] = $user['NAME'];
    $_SESSION['email'] = $user['email'];
    // Chuyen huong ve trang home
    header("Location:../admin/adminPage.php");
    echo "Dang nhap thanh cong";

}
