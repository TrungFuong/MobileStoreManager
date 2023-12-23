<?php
require "header.php";
require_once("dBConnect.php");


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
   $sql = "SELECT * FROM products WHERE name LIKE '%" . $kw . "%'";
   if ($orderby != "DEFAULT") {
      $sql = "SELECT * FROM products WHERE name LIKE '%" . $kw . "%' ORDER BY price " . $orderby;
   }
}

$limit = 9;

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
mysqli_close($conn);
?>
<div class="banner_section layout_padding">
   <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Gimme ur money</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Gimme ur money</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Gimme ur money</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>
</div>
<div class="fashion_section">
   <div class="container">
      <br>
      <h1 class="fashion_taital">Electronic</h1>
      <div class="fashion_section_2">
         <div class="row">
            <?php if (mysqli_num_rows($products) == 0) {
               echo "<tr><td colspan='3'>Khong co san pham</td></tr>";
            } else {
               while ($row = mysqli_fetch_assoc($products)) { ?>

                  <div class="col-lg-4 col-sm-4">
                     <div class="box_main">
                        <h4 class="shirt_text"><?php echo $row['name'] ?></h4>
                        <p class="price_text">Start Price <span style="color: #262626;"><?php echo $row['price'] ?></span></p>
                        <div class="electronic_img"><img src="<?php echo $row['image'] ?>"></div>
                        <div class="btn_main">
                           <div class="buy_bt"><a href="productPage.php?id=<?php echo $row['id'] ?>">Details</a></div>
                        </div>
                     </div>
                  </div>
            <?php }
            } ?>
         </div>
      </div>
   </div>
</div>

<div style="float:right;position: relative; bottom:20vh;right:14vw;">
   <button style="font-size: 30px;border: none; background-color: transparent;" form="searchForm" name="page" value="<?php echo ($page - 1) ?>" type="submit"><i class="fas fa-angle-left"></i></button>
   <span style="font-size: 30px;"><?php echo "$page" ?></span>
   <button style="font-size: 30px;border: none; background-color: transparent;" form="searchForm" name="page" value="<?php echo ($page + 1) ?>" type="submit"><i class="fas fa-angle-right"></i></button>
</div>

<?php require "footer.php"; ?>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/jquery-3.0.0.min.js"></script>
<script src="js/plugin.js"></script>

<script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="js/custom.js"></script>
<script>
   function openNav() {
      document.getElementById("mySidenav").style.width = "250px";
   }

   function closeNav() {
      document.getElementById("mySidenav").style.width = "0";
   }
</script>
</body>

</html>