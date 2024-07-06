<?php
session_start();
//koneksi ke database
include "koneksi.php";

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
    <style>
        .cards-wrapper {
            display: flex;
            justify-content: center;
        }

        .card img {
            max-width: 100%;
            max-height: 100%;
        }

        .card {
            margin: 0 0.5em;
            box-shadow: 2px 6px 8px 0 rgba(22, 22, 26, 0.18);
            border: none;
            border-radius: 0;
        }

        .carousel-inner {
            padding: 1em;
        }

        .carousel-control-prev,
        .carousel-control-next {
            background-color: #e1e1e1;
            width: 5vh;
            height: 5vh;
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
        }

        @media (min-width: 768px) {
            .card img {
                height: 11em;
            }
        }
    </style>

    <title>SI - DO'I Paket Ziarah</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="asset/fonts/icomoon/style.css">

    <link rel="stylesheet" href="asset/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="asset/css/style.css">

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
   
    
    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.php">SI - DO'I</a></h1>
          </div>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="index.php" class="nav-link">Tour Builder</a></li>
                <li><a href="paket_ziarah2.php" class="nav-link active">Paket Ziarah</a></li>
                <li><a href="login.php" class="nav-link" style="margin-left: 50px;">Login</a></li>
              </ul>
            </nav>
          </div>


          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

    <div class="hero" style="background-image: url('asset/images/new2.png');"></div>
    <!--/.Navbar -->

    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.sticky.js"></script>
    <script src="asset/js/main.js"></script>

    <!-- konten -->
    <div class="container" style="margin-bottom: 50px;">
        <h2 style="margin-top: 50px;">Paket Ziarah</h2>

        <hr color="black">

        <div class="row">

            <?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
            <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                <div class="col-md-3 mb-3">
                    <div class="panel-body" style="text-align : center; overflow: hidden; padding: 0;">
                        <img style="max-height: 170px;" class="img-fluid img-thumbnail" src="foto_produk/<?php echo $perproduk['foto_produk'] ?>">
                        <div class="caption">
                            <h5><?php echo $perproduk['nama_produk'] ?></h5>
                            <h6>Rp. <?php echo number_format($perproduk['harga_produk']) ?></h6>
                            <a href="login.php" class="btn btn-primary">Detail</a>
                            <a href="login.php" class="btn btn-primary"><span class="icon-bookmark"></span></a>
                            <br><br><br><br>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>
    </div>
    <!-- /konten -->

    <!-- Footer -->
    <footer class="page-footer bg-dark font-small stylish-color-dark pt-4" style="color: white">

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

                    <p>
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
                        <p>
                            <i class="fas fa-home mr-3"></i> Malang, Indonesia
                        </p>
                        <p>
                            <i class="fas fa-envelope mr-3"></i> sido'i@gmail.com
                        </p>
                        <p>
                            <i class="fas fa-phone mr-3"></i> +6282-301-329-134
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
                                <span class="icon-facebook text-light"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="mx-1" href="#">
                                <span class="icon-twitter text-light"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="mx-1" href="#">
                                <span class="icon-instagram text-light"></span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="mx-1" href="#">
                                <span class="icon-youtube text-light"></span>
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