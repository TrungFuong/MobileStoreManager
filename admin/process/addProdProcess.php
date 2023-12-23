<?php

// Buoc 1: Co du lieu tu form
if (!isset($_POST['submit'])) {
    die("Phai nhap du lieu tu form");
}


$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$URL = $_POST['URL'];
var_dump($name, $price, $description);
// $file = $_FILES['image'];

// // Lay ten file 
// $fileName = $file['name'];

// Di chuyen file do den thuc muc public/images
// $imageURL = 'public/images/'.$fileName;
// move_uploaded_file($file['tmp_name'], $imageURL);

// Buoc 2: Ket noi vao  DB
require_once("../../dBConnect.php");

// Buoc 3: insert 
$sql = "INSERT INTO products VALUES (NULL, '$name','$price','$URL', '$description')";
echo $sql;

// Buoc 4: chuyen huong ve trang xem toan bo san pham
$rs = mysqli_query($conn, $sql);

if ($rs == true) {
    // echo "Thêm thành công!";
    header("location:../adminPage.php");
} else {
    echo "Thêm thất bại: " . mysqli_error($conn);
}
mysqli_close($conn);
