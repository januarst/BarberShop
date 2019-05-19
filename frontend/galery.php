<?php
  session_start();
  include_once('../backend/listFungsi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pak Kumis Barbershop | Galery</title>
<meta charset="utf-8">
<link rel="icon" href="images/favicon.ico">
<link rel="shortcut icon" href="images/favicon.ico">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/prettyPhoto.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.prettyPhoto.js"></script>
<script>
$(document).ready(function () {
    $("a[data-gal^='prettyPhoto']").prettyPhoto({
        theme: 'facebook'
    });
});
</script>
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<link rel="stylesheet" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div class="main">
  <header>
    <div class="container_12">
      <div class="grid_12">
        <a href="index.php"><img src="../logo/logo1.png" alt=""></a>
        <div class="menu_block">
          <nav class="fixe-top" >
            <ul class="sf-menu">
              <?php
                $i = 0;
                if(isset($_SESSION['is_logged_in'])){
                $database = dbConnect();
                $query = "SELECT * FROM cart";
                $result_one = $database->query($query);
                while ($test = $result_one->fetch_assoc()) {
                  $i++;
                }
                }
              ?>
              <li><a href="index.php">Home</a></li>
              <li class="with_ul"><a href="about-us.php">About Us</a>
              </li>
              <li><a href="shop.php">Shop</a></li>
              <li class="current"><a href="galery.php">Galery</a></li>
              <li><a href="cart.php">Cart(<?php echo $i; ?>)</a></li>
              <?php if(!isset($_SESSION['is_logged_in'])){ ?>
              <li><a href="../login.html">login</a></li>
              <?php }else{ ?>
              <li><a href="../logout.php">logout</a></li>
              <?php } ?>
            </ul>
          </nav>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </header>
   <div class="content">
    <div class="container_12">
      <div class="grid_12">
        <h2>Portfolio</h2>
      </div>
      <div class="clear"></div>
      <div>
        <div class="grid_6"><a href="images/model/1.jpg" data-gal="prettyPhoto[1]"><span></span><img src="images/model/1.jpg" alt=""></a></div>

        <div class="grid_6"><a href="images/model/2.jpg" data-gal="prettyPhoto[1]"><span></span><img src="images/model/2.jpg" alt=""></a></div>

        <div class="grid_6"><a href="images/model/3.jpg" data-gal="prettyPhoto[1]"><span></span><img src="images/model/3.jpg" alt=""></a></div>

        <div class="grid_6"><a href="images/model/5.jpg" data-gal="prettyPhoto[1]"><span></span><img src="images/model/5.jpg" alt=""></a></div>
      </div>
      <div class="clear"></div>
      <div class="bottom_block">
        <div class="grid_6">
          <h3>Follow Us</h3>
          <div class="socials"> <a href="#"></a> <a href="#"></a> <a href="#"></a> </div>
        </div>
        <div class="grid_6">
          <h3>Addres</h3>
          <p class="col1">
            Address : Jl. Sisingamangaraja, sitoluama, laguboti, tobasamosir, sumatera utara.<br>
            No Tlp  : +6285-2500-41000<br>
            Kode Pos: 22381
          </p>
        </div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
<footer>
  <div class="container_12">
    <div class="grid_12"> Gourmet Traditional Restaurant &copy; 2045 | <a href="#">Privacy Policy</a> | Design by: <a href="http://www.templatemonster.com/">TemplateMonster.com</a> </div>
    <div class="clear"></div>
  </div>
</footer>
</body>
</html>