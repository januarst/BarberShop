<?php
  session_start();
  include_once('listFungsi.php');

 if(isset($_GET['code'])){
  $code = $_GET['code'];

  $query = "UPDATE transaksi SET status = 'DIKIRIM' WHERE ID=". $code;
  $database = dbConnect();
  $statement5 = $database->query($query);

 }



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Pak Kumis Barbershop | Admin</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="pembelian.php">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="nav-link-text">Pembelian</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="produk.php">
            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
            <span class="nav-link-text">Produk</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="jasa.php">
            <i class="fa fa-child" aria-hidden="true"></i>
            <span class="nav-link-text">Booking</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="kupon.php">
            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>
            <span class="nav-link-text">Kupon</span>
          </a>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="services.php">
            <i class="fa fa-sign-language" aria-hidden="true"></i>
            <span class="nav-link-text">Jasa</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="manual.php">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            <span class="nav-link-text">Manual</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <?php if(isset($_SESSION['is_logged_in'])){?>
            <a href="../logout.php"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
          <?php }else{ ?>
            <a href="../login.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
          <?php } ?>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Halaman Pembelian</li>
      </ol>
      <div class="row">
        <div class="col-12">
          <h1>Table Pembelian</h1>
          <table border="1" width="100%">
            <tr>
              <td>Nama</td>
              <td>Barang</td>
              <td>Quantity</td>
              <td>Harga</td>
              <td>Bukti</td>
              <td>Status</td>
            </tr>
            <?php
            $db = dbConnect();
            $query = "SELECT * FROM transaksi";
            $statement = $db->query($query);
            while($row = $statement->fetch_assoc()){
                $query0 = "SELECT * FROM konfirmasi";
                $statement0 = $db->query($query0);
                $row0 = $statement0->fetch_assoc();
                $query6 = "SELECT * FROM pembelian";
                $statement6 = $db->query($query6);
                $row6 = $statement6->fetch_assoc();

                $query1 = "SELECT * FROM userdetail WHERE User_ID =". $row0['Pembelian_User_ID'];
                $query2 = "SELECT * FROM produk WHERE ID =". $row6['Produk_ID'];

                $statement1 = $db->query($query1);
                $statement2 = $db->query($query2);

                $row1 = $statement1->fetch_assoc();
                $row2 = $statement2->fetch_assoc();
            ?>
            <tr>

              <td><?php echo $row1['Nama']; ?></td>
              <td><?php echo $row2['nama_Produk']; ?></td>
              <td><?php echo $row6['Quantity']; ?></td>
              <td><?php echo $row['totalHarga']; ?></td>
              <td><?php echo $row['bukti']; ?></td>
              <td><?php echo $row['status']; ?></td>
              <?php if($row['status'] == "PENDING"){ ?>
              <td><a href="pembelian.php?code=<?php echo $row['ID']; ?>">Konfirmasi</a></td>
              <?php }else{ ?>
              <td>DONE</td>
              <?php } ?>
            </tr>

            <?php
            }
            ?>
          </table>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
