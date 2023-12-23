<?php
require_once("../dBConnect.php");

function currency_format($number, $suffix = 'đ')
{
  if (!empty($number)) {
    return number_format($number, 0, ',', '.') . "{$suffix}";
  }
}

$kw = '';

if (isset($_GET['kw'])) {
  $kw = $_GET['kw'];
}
$orderby = 'DEFAULT';

if (isset($_GET['orderby'])) {
  $orderby = $_GET['orderby'];
}



if (empty($kw)) {
  $sql = "SELECT * FROM products";
  if ($orderby != "DEFAULT") {
    $sql = "SELECT * FROM products ORDER BY price " . $orderby;
  }
} else {
  $sql = "SELECT * FROM products WHERE name LIKE '%" . $kw . "%' ";
  if ($orderby != "DEFAULT") {
    $sql = "SELECT * FROM products WHERE name LIKE '%" . $kw . "%' " . $orderby;
  }
}

$limit = 5;
if (isset($_GET['limit'])) {
  $limit = $_GET['limit'];
}

$total = 0;
if (!empty($kw)) {
  $sql_tmp = "SELECT COUNT(id) AS 'total' FROM products WHERE name LIKE '%" . $kw . "%'";
} else {
  $sql_tmp = "SELECT COUNT(id) AS 'total' FROM products";
}


$rs1 = mysqli_query($conn, $sql_tmp);

if ($rs1 == false) {
  die(mysqli_error($conn));
}

$total = mysqli_fetch_assoc($rs1)['total'];

$totalPages = ceil($total / $limit);

$page = 1;
if (isset($_GET['page'])) {
  $page = $_GET['page'];
}
if ($page < 1) {
  $page = 1;
}
if ($page > $totalPages && $totalPages>1) {
  $page = $totalPages;
}


$offset = ($page - 1) * $limit;

$sql = $sql . " LIMIT $offset,$limit";

$products = mysqli_query($conn, $sql);
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
  <br />
  <div class="container">
    <h1>Chỉnh sửa sản phẩm</h1>
    <form method="GET" id="searchForm">
      <input name='kw' style='float: right;border-radius:5px;border: 1px solid lightGrey;position:relative;left:0.7vw;' placeholder='product name...' value="<?php echo (empty($kw) ? '' : $kw) ?>"></input>
      <button hidden type="submit" class="btn btn-primary">Submit</button>
    </form>

    <select name="orderby" form="searchForm" onchange="this.form.submit()" style='float: right;border-radius:5px;border: 1px solid lightGrey;position:relative;left:-0.5vw;height:28px;color:grey;'>
      <option value="DEFAULT" <?php if ($orderby == "DEFAULT") echo "selected";  ?>>Mặc định</option>
      <option value="ASC" <?php if ($orderby == "ASC") echo "selected";  ?>>Gía tăng dần</option>
      <option value="DESC" <?php if ($orderby == "DESC") echo "selected";  ?>>Giá giảm dần</option>
    </select>

    <select name="limit" form="searchForm" onchange="this.form.submit()" style='float: right;border-radius:5px;border: 1px solid lightGrey;position:relative;left:-1vw;;height:28px;color:grey;'>
      <option value="1" <?php if ($limit == 1) echo "selected" ?>>1 sản phẩm</option>
      <option value="5" <?php if ($limit == 5) echo "selected" ?>>5 sản phẩm</option>
      <option value="10" <?php if ($limit == 10) echo "selected" ?>>10 sản phẩm </option>
      <option value="15" <?php if ($limit == 15) echo "selected" ?>>15 sản phẩm </option>
    </select>

    <br />
  </div>
  <br />
  <table class="table table-bordered container">
    <tr class="text-center" style="background-color:#3b4a6b;border: black;">
      <th style="color: white;">Id</th>
      <th style="color: white;">Name</th>
      <th style="color: white;">Image</th>
      <th style="color: white;">Price</th>
      <th style="color: white;">Command</th>
    </tr>
    <!-- Hien thi san pham -->
    <?php
    if (mysqli_num_rows($products) == 0) {
      echo "<tr><td colspan='3'>Khong co san pham</td></tr>";
    } else {
      while ($row = mysqli_fetch_assoc($products)) {
        echo "<tr style='background-color:white;'>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td><b>" . $row['name'] . "</b></td>";
        echo "<td><img width='200px' src='" . $row['image'] . "'/></td>";
        echo "<td>" . currency_format($row['price']) . "</td>";

        echo "<td><form action='process/delProdProcess.php' method='POST' enctype='multipart/form-data'>";
        echo "<input hidden class='form-control' name='id' value='" . $row['id'] . "'/>";
        echo "<button name='submit' type='submit' style='background-color:#3b4a6b;color: white;border-radius:15px; border: none; padding-block: 5px;'>Delete</button>";
        echo "</form>";

        echo "<form action='adminPage_alter.php' method='POST' enctype='multipart/form-data'>";
        echo "<input hidden class='form-control' name='id' value='" . $row['id'] . "'/>";
        echo "<input hidden class='form-control' name='name' value='" . $row['name'] . "'/>";
        echo "<input hidden class='form-control' name='price' value='" . $row['price'] . "'/>";
        echo "<input hidden class='form-control' name='description' value='" . $row['description'] . "'/>";
        echo "<input hidden class='form-control' name='URL' value='" . $row['image'] . "'/>";
        echo "<button name='submit' type='submit' style='background-color:#3b4a6b;color: white;border-radius:15px; border: none; padding-block: 5px;position: relative;top:1vw;'>Alter</button>";

        echo "</form></td>";
        echo "</tr>";
      }
    }
    ?>
  </table>
  <div style="float:right;position:relative;right:4vw;">
    <button style="font-size: 30px;border: none;" form="searchForm" name="page" value="<?php echo ($page - 1) ?>" type="submit"><i class="fas fa-angle-left"></i></button>
    <span style="font-size: 30px;"><?php echo "$page" ?></span>
    <button style="font-size: 30px;border: none;" form="searchForm" name="page" value="<?php echo ($page + 1) ?>" type="submit"><i class="fas fa-angle-right"></i></button>
  </div>
</body>

</html>