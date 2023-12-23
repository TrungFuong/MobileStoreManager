<?php
session_start();
if (empty($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}
array_push($_SESSION['cart'], $_POST['id']);
if (array_push($_SESSION['cart'], $_POST['id']) == true) {
    echo "them thanh cong";
    header("location:../productPage.php?id={$_POST['id']}");
} else {
    echo "Thêm thất bại";
}
