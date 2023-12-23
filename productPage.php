<?php
session_start();
require "header.php";
require_once("dBConnect.php");
if (isset($_GET['id'])) {
   $id = $_GET['id'];
}
$sql = "SELECT * FROM products WHERE id = $id";
$products = mysqli_query($conn, $sql);
mysqli_close($conn);
?>

<h6 style="color: transparent;">Hello </h6>
</div>

<div class="fashion_section">
   <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">

      <div class="fashion_section_2">

         <?php
         while ($row = mysqli_fetch_assoc($products)) {
         ?>
            <div class="col-lg-4 col-sm-4" style="float: left;">
               <div class="box_main">
                  <h4 class="shirt_text"><?php echo $row['name'] ?></h4>

                  <div class="electronic_img"><img src="<?php echo $row['image'] ?>"></div>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#"><?php echo $row['price'] ?></a></div>

                  </div>
               </div>
            </div>

            <div style="float: leftt;" class='prodInfo'>
               <p style="text-align: justify;padding:10px"><?php echo $row['description'] ?></p>

               <form action='process/insertCartProcess.php?' method='POST' enctype='multipart/form-data'>
                  <input hidden class='form-control' name='id' value="<?php echo $row['id'] ?>" />
                  <button style="background-color: #f26522; border:#f26522;position:relative;left:2vw;" name='submit' type='submit' class='btn btn-primary'>Add to Cart</button>
               </form>
            </div>

         <?php } ?>


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

<?php include "footer.php" ?>
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