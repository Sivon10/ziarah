<?php
session_start();
//koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "toko");
// 
//jika belum login akan dilarikan ke halaman login
if (!isset($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login dulu!');</script>";
    echo "<script>location='login.php';</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dashboard Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header bg-dark">
                <h3>DASHBOARD</h3>
            </div>

            <ul class="list-unstyled components bg-dark">
                <li>
                    <a href="index.php"></i>Home</a>
                </li>
                <li>
                    <a href="index.php?halaman=produk"></i>Paket Ziarah</a>
                </li>
                <li>
                    <a href="index.php?halaman=panduan_doa"></i>Panduan Doa</a>
                </li>
                <li>
                    <a href="index.php?halaman=pembelian"></i>Pembelian</a>
                </li>
                <li>
                    <a href="index.php?halaman=laporan_pembelian"></i>Laporan</a>
                </li>
                <li>
                    <a href="index.php?halaman=pelanggan"></i>Pelanggan</a>
                </li>
                <li>
                    <a href="index.php?halaman=jamsul"></i>Penjemputan</a>
                </li>
                <li>
                    <a href="index.php?halaman=komentar"></i>Komentar</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-secondary">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link"><?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?halaman=logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <?php
            if (isset($_GET['halaman'])) {
                if ($_GET['halaman'] == "produk") {
                    include 'produk.php';
                } elseif ($_GET['halaman'] == "pembelian") {
                    include 'pembelian.php';
                } elseif ($_GET['halaman'] == "pelanggan") {
                    include 'pelanggan.php';
                } elseif ($_GET['halaman'] == "detail") {
                    include 'detail.php';
                } elseif ($_GET['halaman'] == "tambahproduk") {
                    include 'tambahproduk.php';
                } elseif ($_GET['halaman'] == "hapusproduk") {
                    include 'hapusproduk.php';
                } elseif ($_GET['halaman'] == "ubahproduk") {
                    include 'ubahproduk.php';
                } elseif ($_GET['halaman'] == "hapuspelanggan") {
                    include 'hapuspelanggan.php';
                } elseif ($_GET['halaman'] == "logout") {
                    include 'logout.php';
                } elseif ($_GET["halaman"] == "pembayaran") {
                    include 'pembayaran.php';
                } elseif ($_GET["halaman"] == "laporan_pembelian") {
                    include 'laporan_pembelian.php';
                } elseif ($_GET["halaman"] == "umpanbalik") {
                    include 'umpanbalik.php';
                } elseif ($_GET["halaman"] == "hapusumpanbalik") {
                    include 'hapusumpanbalik.php';
                } elseif ($_GET["halaman"] == "jamsul") {
                    include 'jamsul.php';
                } elseif ($_GET["halaman"] == "hapusjamsul") {
                    include 'hapusjamsul.php';
                } elseif ($_GET["halaman"] == "tambahjamsul") {
                    include 'tambahjamsul.php';
                } elseif ($_GET["halaman"] == "komentar") {
                    include 'komentar.php';
                } elseif ($_GET["halaman"] == "hapuskomentar") {
                    include 'hapuskomentar.php';
                } elseif ($_GET["halaman"] == "hapuspembelian") {
                    include 'hapuspembelian.php';
                } elseif ($_GET["halaman"] == "detailpembayaran") {
                    include 'detailpembayaran.php';
                } elseif ($_GET["halaman"] == "batalpembayaran") {
                    include 'batalpembayaran.php';
                } elseif ($_GET["halaman"] == "panduan_doa") {
                    include 'panduan_doa.php';
                } elseif ($_GET["halaman"] == "tambahpanduan") {
                    include 'tambahpanduan.php';
                } elseif ($_GET["halaman"] == "hapuspanduan") {
                    include 'hapuspanduan.php';
                } elseif ($_GET["halaman"] == "tambahpaket") {
                    include 'tambahpaket.php';
                } elseif ($_GET["halaman"] == "ubahpaket") {
                    include 'ubahpaket.php';
                } elseif ($_GET["halaman"] == "hapuspaket") {
                    include 'hapuspaket.php';
                }
            } else {
                include 'home.php';
            }
            ?>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
