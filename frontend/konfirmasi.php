<?php
  session_start();
  include_once('../backend/listFungsi.php');
$IDku = "NONE";
if(isset($_SESSION['is_logged_in'])){
  $IDku = $_SESSION['userId'];
}

if(isset($_POST['apply'])){
  $coupon = $_POST['coupon'];
  $db = dbConnect();
  $query = "SELECT * FROM kupon WHERE status = 'BELUM'";
  $statement = $db->query($query);
  while($row_check = $statement->fetch_assoc()){
    if($row_check['cupon_code']==$coupon){
      $_SESSION['cupon'] = TRUE;
      break;
    }
  }
  if(isset($_SESSION['cupon'])){
    $query = "UPDATE kupon SET status = 'DONE' WHERE cupon_code = '$coupon'";
    $statement = $db->query($query);
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pak Kumis Barbershop | Konfirmasi</title>
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
          <h2>Cart</h2>
          <a href="#" class="prev"></a><a href="#" class="next"></a>
          <ul class="carousel1">
            <?php
            $database = dbConnect();
            $query = "select * from cart";
            $result_set = $database->query($query);
            $x = 0;
            while ($row = $result_set->fetch_assoc()) {
            $query3 = "insert into pembelian(User_ID, Produk_ID, Quantity, Harga, Diskon) VALUES(". $row['User_ID'].",". $row['Produk_ID'] .",". $row['Quantity'] .",". $row['Harga'] .",". $row['Diskon'] .")";
            $statement3 = $database->query($query3);

            $query2 = "select * from produk where ID =". $row['Produk_ID'];
            $statement = $database->query($query2);
            $row_set = $statement->fetch_assoc();
            $nama_set = $row_set['nama_Produk'];
            $y=0;
            ?>
            <li>
              <div>
                <div class="col1 upp"><?php echo $nama_set; ?></div>
                <div>IDR <?php echo $row['Harga']; ?></div>
                <div>Diskon = <?php echo $row['Diskon']; ?>%</div>
                <div>Quantity = <?php echo $row['Quantity']; ?></div>
              </div>
            </li>

            <?php
            $y = $y + $row['Harga']-(($row['Harga']*$row['Diskon'])/100);
            $none = "NONE";
            $pending = "PENDING";

            $query4 = "SELECT * FROM pembelian WHERE User_ID=". $IDku;
            $statement5 = $database->query($query4);

            while ($rowed = $statement5->fetch_assoc()) {

            $query = "INSERT INTO konfirmasi(Pembelian_ID, Pembelian_User_ID, status, totalHarga, quantity) VALUES(?,?,?,?,?)";
            $statement4 = $database->prepare($query);
            $statement4->bind_param('iisii', $rowed['ID'], $IDku, $pending, $y, $rowed['Quantity']);
            $statement4->execute();
              
            }

            $x = $x + $y;
                if(isset($_SESSION['cupon'])){
                  $x = $x - 50000;
                }
                if($x < 0){
                  $x = 0;
                }
            }
            ?>
          </ul>
        </div>
          <form action="konfirmasi.php" method="post">
          <br><div>Kupon <input type="text" name="coupon"><input type="submit" name="apply" value="Apply"></div>
          </form>
          <br><p>Total Harga : <?php echo $x; ?></p> 
          <h3><a href="konfirmasi2.php?code=<?php echo $x; ?>">Bayar</a></h3>
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