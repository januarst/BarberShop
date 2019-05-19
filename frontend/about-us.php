<?php
  session_start();
  include_once('../backend/listFungsi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Pak Kumis Barbershop | About Us</title>
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
              <li class="with_ul current"><a href="about-us.php">About Us</a>
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
  <div class="content">
    <div class="container_12">
      <div class="grid_5">
        <h2>About Us</h2>
        <img src="images/barbershop.png.jpg" alt="" class="img_inner">
        <p class="col1">"SEJARAH SINGKAT PAK KUMIS BARBERSHOP"</p>
        <p>Pelayanan jasa perawatan rambut pria sudah ada sejak 2000 tahun yang lalu. Praktek pemotongan rambut pada pria (Barbershop) berawal dari wilayah MACEDONIA sekitar 400 tahun sebelum masehi kemudian menyebar ke daerah lainnya seperti Mesir.
        Kata "barber" berasal dari bahasa latin "barba" yang memiliki arti "janggut". Pada tahun 296 sebelum masehi bangsa Roma mengklaim  diri paling ahli dalam jasa pelayanan pemotongan rambut, meski begitu pamor barbershop kurang baik dikalangan elit kerajaan yang mempunyai tukang cukur pribadi. Pada masa ini, janggut pada lelaki menjadi symbol kekuatan dan intelegensi sehingga harus dirawat dengan baik dan teratur.</p>
        <p></p>
        Barbershop sekarang di Indonesia semakin menjamur. Di setiap pengkolan, udah masuk ke gang di Jakarta dan udah masuk ke mall.
        Hal ini pun menandakan, bahwa Barbershop mulai naik kelas dan disukai banyak orang. Pasalnya, tak hanya mampu membuat penampilan menjadi lebih trendi, bisnis barbershop juga dinilai Ade semakin menjanjikan."Artinya barber shop sekarang sudah mulai naik kelas" <br>
        <a href="#" class="btn m1">More</a> </div>
      <div class="grid_5 prefix_2">
        <h2>Testimonials</h2>
        <ul class="carousel2">
          <li>
            <blockquote> <img src="images/1.jpg" alt="">
              <div class="extra_wrapper">
                <div class="title">Ricky Bahryzal <br></div>
              </div>
              <div class="clear"></div>
              <p>Gak ada kapoknya untuk balik lagi potong rambut di Barbershop Pak Kumis karna hasilnya yang tidak pernah mengecewakkan.</p>
              <p>Aku dan anak-anakku suka sekali potong rambut di Barbershop Pak Kumis. kerjanya Cepat dan personel di Barbershop Pak Kumis sangat ahli dalam memotong rambut. Dan semua peralatannya di STERIL sehingga kita tidak takut akan ke HIGIENIS an nya. dan yang paling utama harganya sangat Terjangkau dengan kualitas yang sangat baik.</p>
            </blockquote>
          </li>
          <li>
            <blockquote> <img src="images/2.jpg" alt="">
              <div class="extra_wrapper">
                <div class="title">Anang Sugandi<br></div>
              </div>
              <div class="clear"></div>
              <p>Pertama kali coba potong rambut di Barbershop Pak Kumis hasilnya Keren!! bikin puas dan kayaknya bakal jadi langganan. udah gitu yang potongnya ngerti yang gw pengen, nayaman banget lagi. Thanks yaa @barbershoppakkumis.</p>
            </blockquote>
          </li>
        </ul>
        </div>
      <div class="clear"></div>
      <div class="grid_12">
        <div class="hor_separator hor1"></div>
        <h2 class="head1">Our Best Staff</h2>
      </div>
      <div class="clear"></div>
      <div class="chefs">
        <div class="grid_3"> <img src="images/model/6.jpg" alt="" class="img_inner">
          <p class="col1"><a href="#">Jajang Muhidin</a></p>
          I started my barbering career at the beginning of 2017 at my local Barbershop as an apprentice. Whilst working there I would always watch videos, practice home haircuts and always visit Pak Kumis to expand my barbering knowledge. A few days into the new year of 2018 and I land my dream job at Pak Kumis Barbershop Eastbourne with my good friend / Work partner Sina. Stay fresh and get yourself down to Pak Kumis Barbershop.</div>
        <div class="grid_3"> <img src="images/model/7.jpg" alt="" class="img_inner">
          <p class="col1"><a href="#"> Dimas Rahadian</a></p>
          I started barbering 2012. A spotty teenager, too shy to hold a conversation with a client. Little did I know I eventually discovered my favourite aspect of my job is the social environment! I have no genuine reason why I started barbering but I'm very glad I did. It is a skill I will take with me to my grave. I look forward to getting to know each and every client and putting a smile on every face that walks though the door.</div>
        <div class="grid_3"> <img src="images/model/8.jpg" alt="" class="img_inner">
          <p class="col1"><a href="#">Missy Tia</a></p>
          I started my hairdressing career at Pak Kumis as an apprentice in 2016. I am now a qualified stylist and loving every second of it! I enjoy every aspect of the job, and I'm so happy I choose to pursue something that I've always wanted to do!!</div>
       <div class="grid_3"> <img src="images/model/9.jpg" alt="" class="img_inner">
          <p class="col1"><a href="#">Tengku Fadly</a></p>
          Since a young age I have always loved hairdressing. I always used to treat my brothers to a new look! So when I was offered an apprenticeship in 2013 I took it instantly and have been Hairdressing ever since! I love every aspect of the job - Getting to know my clients, learning new tricks and I never shy away from a good old challenge!</div>
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