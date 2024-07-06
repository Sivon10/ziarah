<?php
    session_start();
    //koneksi ke database
    include 'koneksi.php';

    $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'"); 
           
    //update data pembelian menjadi batal
    $koneksi->query("UPDATE pembelian SET status_pembelian='batal' WHERE id_pembelian='$_GET[id]'");

    echo "<script>location='history_pesanan.php';</script>";
?>
