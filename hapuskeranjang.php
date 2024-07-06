<?php
session_start();
//koneksi ke database
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM keranjang WHERE id_keranjang='$_GET[id]'");

$koneksi->query("DELETE FROM keranjang WHERE id_keranjang='$_GET[id]'");

echo "<script>location='keranjang.php';</script>";
?>