<?php
    session_start();
    //koneksi ke database
    include 'koneksi.php';
	
	$email_pelanggan = $_SESSION["pelanggan"]['email_pelanggan'];

	$ambil = $koneksi->query("SELECT * FROM wishlist WHERE email_pelanggan='$email_pelanggan' AND id_produk='$_GET[id]'");

	$koneksi->query("DELETE FROM wishlist WHERE email_pelanggan='$email_pelanggan' AND id_produk='$_GET[id]'");

	echo "<script>location='wishlist.php';</script>"
?>