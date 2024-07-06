<?php
	$ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$_GET[email]'");
	$koneksi->query("DELETE FROM pelanggan WHERE email_pelanggan='$_GET[email]'");

	$pecah = $koneksi->query("SELECT * FROM profil WHERE email_pelanggan='$_GET[email]'");
	$koneksi->query("DELETE FROM profil WHERE email_pelanggan='$_GET[email]'");

	echo "<script>location='index.php?halaman=pelanggan';</script>"
?>