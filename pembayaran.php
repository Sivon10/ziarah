<?php
session_start();
//koneksi ke database
include 'koneksi.php';

//jika belum login akan dilarikan ke halaman login
if (!isset($_SESSION["pelanggan"])) {
  echo "<script>alert('Silahkan login dulu!');</script>";
  echo "<script>location='login.php';</script>";
}

//mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan email pelanggan yang beli
$email_pelanggan_beli = $detpem["email_pelanggan"];

//mendapatkan email pelanggan yang login
$email_pelanggan_login = $_SESSION["pelanggan"]["email_pelanggan"];

if ($email_pelanggan_login !== $email_pelanggan_beli) {
  echo "<script>alert('Jangan curang bro!');</script>";
  echo "<script>location='history_pesanan.php';</script>";
  exit();
}
?>
<?php
$ambil = $koneksi->query("SELECT * FROM profil");
$em = $ambil->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SI - DO'I - Pembayaran</title>

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="asset/fonts/icomoon/style.css">

  <link rel="stylesheet" href="asset/css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="asset/css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="asset/css/style2.css">

  <!-- CSS -->
  <!-- <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/brands.min.css">
    <link rel="stylesheet" href="assets/css/solid.min.css"> -->

  <!-- JS -->
  <!-- <script src="/scripts/jquery.min.js"></script>
    <script src="assets/js/solid.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/fontawesome.min.js"></script>
    <script src="assets/js/brands.min.js"></script> -->

  <script type="text/javascript">
    var oFReader = new FileReader();
    oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

    oFReader.onload = function(oFREvent) {
      document.getElementById("uploadPreview").src = oFREvent.target.result;
    };
  </script>

  <style>
    img {
      max-width: 240px;
    }
  </style>
</head>

<body>
  <!--Navbar -->
  <div class="site-mobile-menu site-navbar-target">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close mt-3">
        <span class="icon-close2 js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  <header class="site-navbar site-navbar-target bg-dark">

    <div class="container">
      <div class="row align-items-center">

        <div class="col-6 col-xl-2">
          <h1 class="mb-0 site-logo"><a href="index2.php" style="color: #e1e1e1;">SI - DO'I</a></h1>
        </div>

        <div class="col-12 col-md-10 d-none d-xl-block">
          <nav class="site-navigation position-relative text-right" role="navigation">

            <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="index2.php" class="nav-link" style="color: #e1e1e1;">Tour Builder</a></li>
              <li><a href="paket_ziarah.php" class="nav-link" style="color: #e1e1e1;">Paket Ziarah</a></li>
              <li><a href="panduan_doa.php" class="nav-link" style="color: #e1e1e1;">Panduan Doa</a></li>
              <li><a href="history_pesanan.php" class="nav-link" style="color: #e1e1e1; margin-right: 50px;">History Pesanan</a></li>
              <li><a href="wishlist.php" class="nav-link" style="color: #e1e1e1;"><i class="icon-bookmark"></i></a></li>
              <li><a href="keranjang.php" class="nav-link" style="color: #e1e1e1;"><i class="icon-shopping-cart"></i></a></li>
              <li class="has-children">
                <a href="#" class="nav-link" style="color: #e1e1e1;"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></a>
                <ul class="dropdown">
                  <li><a href="profil.php?email=<?php echo $_SESSION["pelanggan"]["email_pelanggan"]; ?>" class="nav-link">Profil</a></li>
                  <li><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>


        <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

      </div>
    </div>

  </header>

  <script src="asset/js/jquery-3.3.1.min.js"></script>
  <script src="asset/js/popper.min.js"></script>
  <script src="asset/js/bootstrap.min.js"></script>
  <script src="asset/js/jquery.sticky.js"></script>
  <script src="asset/js/main.js"></script>

  <!-- Konten -->
  <div class="container" style="margin-bottom: 50px;">

    <br><br><br>

    <h2 style="margin-top: 35px;">Pembayaran</h2>

    <hr color="black">

    <h5>Kirim bukti pembayaran anda disini!</h5>
    <div class="alert alert-info">
      Total tagihan anda sebesar <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong>
    </div>

    <form method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label>Nama Yang Membayar</label>
        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>" name="nama" class="form-control" style="background-color: white;">
      </div>
      <div class="form-group">
        <label>Total Harga</label>
        <input type="text" readonly value="Rp. <?php echo number_format($detpem["total_pembelian"]) ?>" name="jumlah" class="form-control" style="background-color: white;">
      </div>
      <div class="form-group">
        <label>Bank</label>
        <select class="form-control" name="bank">
          <option value="">Pilih Bank</option>
          <option value="mandiri">Mandiri</option>
          <option value="bri">BRI</option>
          <option value="bca">BCA</option>
        </select>
      </div>
      <div class="form-group">
        <label>Foto Bukti</label>
        <div style="margin-bottom: 10px;">
          <img class="img" id="uploadPreview" />
        </div>
        <div>
          <input id="uploadImage" type="file" name="bukti" onchange="PreviewImage();" />
          <script type="text/javascript">
            function PreviewImage() {
              var oFReader = new FileReader();
              oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

              oFReader.onload = function(oFREvent) {
                document.getElementById("uploadPreview").src = oFREvent.target.result;
              };
            };
          </script>
        </div>
      </div>
      <button class="btn btn-primary" name="kirim">Kirim</button>
    </form>
  </div>

  <?php
  //jika tombol kirim ditekan
  if (isset($_POST["kirim"])) {
    //upload foto bukti
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis") . $namabukti;
    move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

    $bank = $_POST["bank"];
    $tanggal = date("Y-m-d");

    //simpan pembayaran
    $koneksi->query("INSERT INTO pembayaran(id_pembelian,bank,tanggal,bukti) VALUES ('$idpem','$bank','$tanggal','$namafiks')");

    //update data pembelian dari pending menjadi sudah kirim pembayaran
    $koneksi->query("UPDATE pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'");

    echo "<script>location='history_pesanan.php';</script>";
  }
  ?>

  <!-- Footer -->
  <footer class="page-footer bg-dark font-small stylish-color-dark pt-4" style="color: white; margin-top: 100px;">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-3">
          <!-- Content -->
          <img class="img-fluid img-thumbnail" src="images/sidoi.jpeg">
        </div>

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Content -->
          <h5 class="font-weight-bold mt-3 mb-4">Tentang Kami</h5>

          <hr color="white">

          <p class="text-light">
            Aplikasi “Si-Do'i” (Solusi Dolan Islami) merupakan sebuah aplikasi yang berguna untuk memudahkan
            peziarah dalam melakukan ziarah wali songo.
          </p>

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-3 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold mt-3 mb-4">Kontak Kami</h5>

          <hr color="white">

          <ul class="list-unstyled">
            <p class="text-light">
              <i class="icon-home mr-3"></i> Malang, Indonesia
            </p>
            <p class="text-light">
              <i class="icon-envelope mr-3"></i> sido'i@gmail.com
            </p>
            <p class="text-light">
              <i class="icon-phone mr-3"></i> +6282-301-329-134
            </p>
          </ul>
          <!-- Links -->

        </div>
        <!-- Grid column -->

        <hr class="clearfix w-100 d-md-none">

        <!-- Grid column -->
        <div class="col-md-2 mx-auto">

          <!-- Links -->
          <h5 class="font-weight-bold mt-3 mb-4">Sosial Media</h5>

          <hr color="white">

          <ul class="list-unstyled">
            <li class="list-inline-item">
              <a class="mx-1" href="#">
                <i class="icon-facebook-f text-light waves-dark"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="mx-1" href="#">
                <i class="icon-twitter text-light"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="mx-1" href="#">
                <i class="icon-instagram text-light"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="mx-1" href="#">
                <i class="icon-youtube text-light"></i>
              </a>
            </li>
          </ul>

        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3">

          <!-- Content -->
          <h5 class="font-weight-bold mt-3 mb-4">Partner Pembayaran</h5>
          <hr color="white">

          <img class="img-fluid img-thumbnail" width="60" height="60" src="images/bri.png">
          <img class="img-fluid img-thumbnail" width="70" height="70" src="images/bca.png">
          <img class="img-fluid img-thumbnail" width="90" height="90" src="images/mandiri.png">

        </div>

      </div>
      <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <hr>

    <!-- Copyright -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center mb-3">
            &copy; Copyright 2022 Si-Do'i. All rights reserved.
          </div>
        </div>
      </div>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->
</body>

</html>