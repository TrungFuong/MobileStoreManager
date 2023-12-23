<?php 

// Buoc 1: Co du lieu tu form
if(!isset($_POST['submit'])){
    die("Phai nhap du lieu tu form");
}
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$brand = $_POST['brand'];
$URL = $_POST['URL'];
// var_dump($name, $price, $description);
// $file = $_FILES['image'];
// (int)$idGet = $_POST['id'];
// $id = (int)$idGet;
// var_dump($id);
// // Lay ten file 
// $fileName = $file['name'];

// Di chuyen file do den thuc muc public/images
// $imageURL = 'public/images/'.$fileName;
// move_uploaded_file($file['tmp_name'], $imageURL);

// Buoc 2: Ket noi vao  DB
require_once("../../dBConnect.php");

// // Buoc 3: insert 
$sql = " UPDATE products SET name='$name', price='$price', description='$description', image='$URL' WHERE id = '$id' ";
// echo $sql;

// // Buoc 4: chuyen huong ve trang xem toan bo san pham
$rs = mysqli_query($conn, $sql);
if($rs == true){
    // echo "Thêm thành công!";
    header("location:../adminPage_del.php");
}
else{
    echo "Xoá thất bại: ".mysqli_error($conn);
}
mysqli_close($conn);