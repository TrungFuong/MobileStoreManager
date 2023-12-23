<?php
session_start();

$id = $_POST['id'];
if (isset($_POST['remove'])) {
    $key = array_search($id, $_SESSION['cart']);
    if ($key !== false)
        unset($_SESSION['cart'][$key]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    header("location:../../shoppingCart.php");
}
var_dump($_SESSION["cart"]);


// $id = $_POST['id'];
// if (isset($_POST['remove'])) {
//     $key = array_search($_POST['id'], $_SESSION['cart']);
//     if ($key !== false)
//         unset($_SESSION['cart'][$key]);
//     $_SESSION["cart"] = array_values($_SESSION["cart"]);
//     // header("location:../../shoppingCart.php");
// }
// var_dump($_SESSION["cart"]);


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

// $_SESSION['msg'] = "Thêm thành công";
