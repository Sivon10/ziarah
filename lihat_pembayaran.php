<?php
session_start();
//koneksi ke database
include 'koneksi.php';

//jika belum login akan dilarikan ke halaman login
if (!isset($_SESSION["pelanggan"])) {
  echo "<script>alert('Silahkan login dulu!');</script>";
  echo "<script>location='login.php';</script>";
}

$id_pembelian = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM pembayaran 
	LEFT JOIN pembelian ON pembayaran.id_pembelian=pembelian.id_pembelian 
	WHERE pembelian.id_pembelian='$id_pembelian'");
$detbay = $ambil->fetch_assoc();

//jika belum ada data pembayaran
if (empty($detbay)) {
  echo "<script>alert('Belum ada data pembayaran');</script>";
  echo "<script>location='history_pesanan.php';</script>";
  exit();
}

//jika data pelanggan yang bayar tidak sama dengan data pelanggan yang login
if ($_SESSION["pelanggan"]['email_pelanggan'] !== $detbay["email_pelanggan"]) {
  echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain!');</script>";
  echo "<script>location='history_pesanan.php';</script>";
  exit();
}
?>
<?php
$ambil = $koneksi->query("SELECT * FROM profil");
$em = $ambil->fetch_assoc();

$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
		ON pembelian.email_pelanggan=pelanggan.email_pelanggan");
$pecah = $ambil->fetch_assoc();
?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>SI - DO'I - Lihat Pembayaran</title>

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
              <li><a href="history_pesanan.php" class="nav-link active" style="color: #e1e1e1; margin-right: 50px;">History Pesanan</a></li>
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

    <h2 style="margin-top: 35px;">Lihat Pembayaran</h2>

    <hr color="black">

    <div class="row">
      <div class="col-md-6">
        <table class="table table-bordered table-responsive-md">
          <tr>
            <th>Nama</th>
            <td><?php echo $pecah["nama_pelanggan"]; ?></td>
          </tr>
          <tr>
            <th>Bank</th>
            <td><?php echo $detbay["bank"]; ?></td>
          </tr>
          <tr>
            <th>Tanggal</th>
            <td><?php echo $detbay["tanggal"]; ?></td>
          </tr>
          <tr>
            <th>Jumlah</th>
            <td>Rp. <?php echo number_format($detbay["total_pembelian"]); ?></td>
          </tr>
        </table>
		<a href="history_pesanan.php" class="btn btn-primary">Kembali</a>
      </div>
      <div class="col-md-6">
        <label>Foto Bukti Pembayaran</label>
        <img class="img-fluid img-thumbnail" src="bukti_pembayaran/<?php echo $detbay['bukti']; ?>">
      </div>
      
    </div>
  </div>

  <!-- Footer -->
  <footer class="page-footer bg-dark font-small stylish-color-dark pt-4" style="color: white; margin-top: 450px;">

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