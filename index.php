<?php require "header.php";
require_once("dBConnect.php");
$sql = "SELECT * FROM products LIMIT 0,3 ";
$sql2 = "SELECT * FROM products LIMIT 3,3 ";
$sql3 = "SELECT * FROM products LIMIT 6,3 ";
$products = mysqli_query($conn, $sql);
$products2 = mysqli_query($conn, $sql2);
$products3 = mysqli_query($conn, $sql3);
mysqli_close($conn);
$i = 0;
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
   <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
         <div class="carousel-item active">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <?php
                     while ($row = mysqli_fetch_assoc($products)) {
                     ?>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text"><?php echo $row['name'] ?></h4>
                              <p class="price_text">Start Price <span style="color: #262626;"><?php echo $row['price']?></span></p>
                              <div class="electronic_img"><img src="<?php echo $row['image'] ?>"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="productPage.php?id=<?php echo $row['id'] ?>">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="electronic.php">See More</a></div>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <?php
                     while ($row = mysqli_fetch_assoc($products2)) {
                     ?>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text"><?php echo $row['name'] ?></h4>
                              <p class="price_text">Start Price <span style="color: #262626;"><?php echo $row['price'] ?></span></p>
                              <div class="electronic_img"><img src="<?php echo $row['image'] ?>"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <div class="carousel-item">
            <div class="container">
               <h1 class="fashion_taital">Electronic</h1>
               <div class="fashion_section_2">
                  <div class="row">
                     <?php
                     while ($row = mysqli_fetch_assoc($products3)) {
                     ?>
                        <div class="col-lg-4 col-sm-4">
                           <div class="box_main">
                              <h4 class="shirt_text"><?php echo $row['name'] ?></h4>
                              <p class="price_text">Start Price <span style="color: #262626;"><?php echo $row['price'] ?></span></p>
                              <div class="electronic_img"><img src="<?php echo $row['image'] ?>"></div>
                              <div class="btn_main">
                                 <div class="buy_bt"><a href="#">Buy Now</a></div>
                                 <div class="seemore_bt"><a href="#">See More</a></div>
                              </div>
                           </div>
                        </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <a class="carousel-control-prev" href="#electronic_main_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
      </a>
      <a class="carousel-control-next" href="#electronic_main_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
      </a>
   </div>
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