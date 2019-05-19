<?php
  session_start();
  include_once('../backend/listFungsi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pak Kumis Barbershop | Home</title>
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
              <li class="current"><a href="index.php">Home</a></li>
              <li class="with_ul"><a href="about-us.php">About Us</a>
              </li>
              <li><a href="shop.php">Shop</a></li>
              <li><a href="galery.php">Galery</a></li>
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
  <div class="slider-relative">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img src="../images/page1-1.jpg" alt=""></li>
          <li><img src="../images/page1-2.jpg" alt=""></li>
          <li class="mb0"><img src="../images/page1-3.jpg" alt=""></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="content page1">
    <div class="container_12">
      <div class="grid_6">
        <h2>Welcome</h2>
        <div class="page1_block col1"> <img src="images/welcome_img.png" alt="">
          <div class="extra_wrapper">
            <p><span class="col2"></span> for more info about this free website template created by TemplateMonster.com </p>
            Aenean nonummy hendrerit mau rellus porta. Fusce suscipit varius m sociis natoque penaibet magni parturient montes nasetur ridiculumula dui. <br> </div>
          <div class="clear"></div>
        </div>
      </div>
      <div class="grid_6">
        <h2>Jasa</h2>
        <div class="page1_block col1">
                <?php
                  $db = dbConnect();
                  $query = "SELECT * FROM jasa";
                  $result_set = $db->query($query);?>
                  <table width="100%"><?php
                  while($row2 = $result_set->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row2['nama_Jasa'] ."</td> ";
                    echo "<td> | </td> ";
                    echo "<td>". $row2['harga_Jasa'] ."</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                ?>
          <div class="clear"></div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="grid_12">
        <div class="hor_separator"></div>
      </div>
      <!-- Booking -->
      <div class="grid_6">
        <div class="car_wrap">
          <h2>Booking</h2>
          <ul class="carousel1">
            <li>
              <div>
                <form action="process/appProcess.php" method="post">
                <textarea name="message" cols="50" rows="5"></textarea>
                <div>Melakukan pembookingan memakan biaya 5000, dan akan di bayar di tempat.</div>
                <?php if(isset($_SESSION['is_logged_in'])){ ?>
                <div><input type="submit" value="Kirim" name="" ></div>
                <?php }else{ ?>
                <br><p>Jika ingin melakukan booking, anda login terlebih dahulu</p>
                <div><a href="../login.php">Login</a></div>
                <?php } ?>
                </form>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <!-- Notifikasi -->
      <div class="grid_6">
        <div class="car_wrap">
          <h2>Notifikasi</h2>
                <?php
                  if(isset($_SESSION['is_logged_in'])){
                  $db = dbConnect();
                  $query = "SELECT * FROM appointment WHERE User_ID = ". $_SESSION['userId'];
                  $result = $db->query($query);
                  ?>
                  <table width="100%"><?php
                  while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>". $row['message'] ."</td> ";
                    echo "<td> | </td> ";
                    echo "<td>". $row['status'] ."</td>";
                    echo "</tr>";
                  }
                  echo "</table>";
                }else{
                  echo "You dont have notification";
                }
                ?>
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