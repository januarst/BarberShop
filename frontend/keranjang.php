<?php
  session_start();
  include_once('../backend/listFungsi.php');
if(isset($_GET['action'])){
  $db = dbConnect();
  if(isset($_GET['code'])){
  $id = $_GET['code'];
  }

  $query3;

  switch ($_GET['action']) {
    case 'delete':
        $query3 = "DELETE FROM cart WHERE ID=". $id;
      break;
    case 'hapus':
        $query3 = "DELETE FROM cart";
      break;
  }

  $result_end = $db->query($query3);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pak Kumis Barbershop | Keranjang</title>
<meta charset="utf-8">
<link rel="icon" href="../logo/small-logo.png">
<link rel="shortcut icon" href="../logo/small-logo.png">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/slider.css">
<script src="js/jquery.js"></script>
<script src="js/jquery-migrate-1.1.1.js"></script>
<script src="js/superfish.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/sForm.js"></script>
<script src="js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script>
$(window).load(function () {
    $('.slider')._TMS({
        show: 0,
        pauseOnHover: false,
        prevBu: '.prev',
        nextBu: '.next',
        playBu: false,
        duration: 800,
        preset: 'fade',
        pagination: true, //'.pagination',true,'<ul></ul>'
        pagNums: false,
        slideshow: 8000,
        numStatus: false,
        banners: false,
        waitBannerAnimation: false,
        progressBar: false
    })
});
$(window).load(function () {
    $('.carousel1').carouFredSel({
        auto: false,
        prev: '.prev',
        next: '.next',
        width: 960,
        items: {
            visible: {
                min: 1,
                max: 4
            },
            height: 'auto',
            width: 240,
        },
        responsive: true,
        scroll: 1,
        mousewheel: false,
        swipe: {
            onMouse: false,
            onTouch: false
        }
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
              <li><a href="galery.php">Galery</a></li>
              <li class="current"><a href="cart.php">Cart(<?php echo $i; ?>)</a></li>
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
  <div class="content page1">
    <div class="container_12">
        <div class="grid_12">
          <h2><a href="cart.php">Cart</a> &nbsp;|&nbsp; <a href="keranjang.php">Belanja Ku</a></h2>
        </div>
        <div class="grid_12">
        <div class="hor_separator"></div>
        <div class="car_wrap">
          <h2>Belanja Ku</h2>
          <a href="#" class="prev"></a><a href="#" class="next"></a>
          <ul class="carousel1">
            <?php
            $database = dbConnect();
            $query = "select * from konfirmasi";
            $result_set = $database->query($query);
            while ($row = $result_set->fetch_assoc()) {
            $query2 = "select * from pembelian where ID =". $row['Pembelian_ID'];
            $statement = $database->query($query2);
            $row_set = $statement->fetch_assoc();

            $query5 = "select * from produk where ID =". $row_set['Produk_ID'];
            $statement5 = $database->query($query2);
            $row_set1 = $statement->fetch_assoc();
            $nama_set = $row_set1['nama_Produk'];
            ?>
            <li>
              <div>
                <div class="col1 upp"><?php echo $nama_set; ?></div>
                <div>IDR <?php echo $row['totalHarga']; ?></div>
                <div>Diskon = <?php echo $row_set['Diskon']; ?>%</div>
                <div>Quantity = <?php echo $row_set['Quantity']; ?></div>
                <br><h3><a href="konfirmasi.php?code=<?php echo $row['ID']; ?>">Bayar</a></h3>
              </div>
            </li>

            <?php
            }
            ?>
          </ul>
        </div>
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