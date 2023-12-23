<?php
session_start();
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_GET['id']);
// session_start();
// Buoc 1: Co du lieu tu form
// if (!isset($_POST['submit'])) {
//     die("Phai nhap du lieu tu form");
// }

// $id = (int)$_POST['id'];
// var_dump($id);
// $file = $_FILES['image'];

// // Lay ten file 
// $fileName = $file['name'];

// Di chuyen file do den thuc muc public/images
// $imageURL = 'public/images/'.$fileName;
// move_uploaded_file($file['tmp_name'], $imageURL);

// // // Buoc 2: Ket noi vao  DB
// require_once("../../dBConnect.php");

// // // Buoc 3: insert 
// $sql = "INSERT INTO orderdetail VALUES ('$id',1)";
// // echo $sql;

// // Buoc 4: chuyen huong ve trang xem toan bo san pham
// $rs = mysqli_query($conn, $sql);
if (array_push($_SESSION['cart'], $_GET['id']) == true) {
    $_SESSION['msg1'] = "Đã thêm vào giỏ hàng";
    header("location:../../productPage.php?id={$_GET['id']}");
} else {
    echo "Thêm thất bại";
}
