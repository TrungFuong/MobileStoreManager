<?php

if (!isset($_POST['submit'])) {
  header("location:adminPage_alter_empty.php");
}
$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];
$URL = $_POST['URL'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DWG | Admin</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <link rel="stylesheet" href="../css/adminPage.css" />
</head>

<body>
  <?php require "nav.php" ?>
  <div class="container">
    <br />
    <?php
    echo "<h1>Sửa sản phẩm : " . $name . "</h1>";
    echo "<br/>";
    echo "<form action='process/alterProdProcess.php' method='POST' enctype='multipart/form-data'>";
    echo "<input class='form-control' type='text' name='name' placeholder='Nhập tên sản phẩm' value='" . $name . "' required />";
    echo "<br/>";
    echo "<input class='form-control' type='text' name='price' placeholder='Giá sản phẩm' min='0' value='" . $price . "' required />";
    echo "  <br/>";
    echo "  <input require class='form-control' type='url' name='URL' placeholder='Nhập URL ảnh sản phẩm' value='" . $URL . "' />";
    echo "  <input hidden require class='form-control' type='int' name='id' placeholder='Nhập URL ảnh sản phẩm' value='" . $id . "' />";
    echo "  <br/>";
    echo "  <br/>";
    echo " <textarea class='form-control' name='description' cols='30' rows='10'>" . $description . "</textarea>";
    echo "  <br/>";
    ?>
    <button name="submit" type="submit" class="btn btn-primary">
      Sửa sản phẩm
    </button>
    </form>
  </div>
  <script src="../js/adminPage.js"></script>
</body>

</html>