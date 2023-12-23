<?php
session_start();

if (!isset($_SESSION['isLoginSuccess'])) {
  header("Location:../auth/login.php");
  die();
}

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
    <h1>Tạo sản phẩm</h1>
    <br />
    <form action="process/addProdProcess.php" method="POST" enctype="multipart/form-data">
      <input class="form-control" type="text" name="name" placeholder="Nhập tên sản phẩm" required />
      <br />
      <input class="form-control" type="text" name="price" placeholder="Giá sản phẩm" min="0" required />
      <br />
      <input required class="form-control" type="url" name="URL" placeholder="Nhập URL ảnh sản phẩm" />
      <br />
      <br />
      <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
      <br />
      <button name="submit" type="submit" class="btn btn-primary">
        Tạo sản phẩm
      </button>
    </form>
  </div>
  <script src="../js/adminPage.js"></script>
</body>

</html>