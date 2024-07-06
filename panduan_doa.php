<?php
session_start();
//koneksi ke database
include "koneksi.php";

//jika belum login akan dilarikan ke halaman login
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login dulu!');</script>";
    echo "<script>location='login.php';</script>";
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

    <title>SI - DO'I Panduan Doa</title>

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
                    <h1 class="mb-0 site-logo"><a href="index2.php">SI - DO'I</a></h1>
                </div>

                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">

                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><a href="index2.php" class="nav-link">Tour Builder</a></li>
                            <li><a href="paket_ziarah.php" class="nav-link">Paket Ziarah</a></li>
                            <li><a href="panduan_doa.php" class="nav-link active">Panduan Doa</a></li>
                            <li><a href="history_pesanan.php" class="nav-link">History Pesanan</a></li>
                            <li><a href="wishlist.php" class="nav-link" style="margin-left: 50px;"><i class="icon-bookmark"></i></a></li>
                            <li><a href="keranjang.php" class="nav-link"><i class="icon-shopping-cart"></i></a></li>
                            <li class="has-children">
                                <a href="#" class="nav-link"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></a>
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

    <div class="hero" style="height: 400px; background-image: url('asset/images/new3.png');"></div>
    <!--/.Navbar -->

    <script src="asset/js/jquery-3.3.1.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/jquery.sticky.js"></script>
    <script src="asset/js/main.js"></script>

    <!-- konten -->
    <section class="riwayat">
        <div class="container" style="margin-bottom: 50px;">
            <h2 style="margin-top: 50px;">Panduan Doa</h2>

            <hr color="black">

            <table class="table table-bordered table-responsive-md">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Ekstensi</th>
                        <th>Size</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    function koneksiDB()
                    {

                        $host = "localhost";
                        $username = "root";
                        $password = "";
                        $db = "toko";

                        $conn = mysqli_connect($host, $username, $password, $db);

                        if (!$conn) {
                            die("Koneksi Database Gagal : " . mysqli_connect_error());
                        } else {
                            return $conn;
                        }
                    }
                    function selectAllData()
                    {
                        $query = "SELECT * FROM panduan";
                        $result = mysqli_query(koneksiDB(), $query);
                        return $result;
                    }
                    $nomor_urut = 0;
                    $result = selectAllData();
                    $countData = mysqli_num_rows($result);

                    if ($countData < 1) {
                    ?>
                        <tr>
                            <td colspan="5" style="text-align: center; font-weight: bold; font-size: 12px; padding: 5px; color: red">TIDAK ADA DATA</td>
                        </tr>

                        <?php
                    } else {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $nomor_urut = $nomor_urut + 1;
                        ?>
                            <tr>
                                <td><?php echo $nomor_urut; ?></td>
                                <td><?php echo $row['nama_buku']; ?></td>
                                <td><?php echo strtoupper($row['ekstensi']) ?></td>
                                <td><?php echo number_format($row['size'] / (1024 * 1024), 2) ?>MB</td>
                                <td><a href="./admin/downloadpanduan.php?url=<?php echo $row['berkas']; ?>" class="btn btn-primary">Download</a></td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <!-- /konten -->

    <!-- Footer -->
    <footer class="page-footer bg-dark font-small stylish-color-dark pt-4" style="color: white; margin-top: 130px;">

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
                            <i class="icon-home mr-3"></i> Malang, Indonesia
                        </p>
                        <p>
                            <i class="icon-envelope mr-3"></i> sido'i@gmail.com
                        </p>
                        <p>
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