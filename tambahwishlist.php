<?php
    session_start();
    include "koneksi.php";

    //mendapatkan id_produk dari url
    $id_produk = $_GET["id"];
    $email_pelanggan = $_SESSION["pelanggan"]['email_pelanggan'];

    //mendapatkan id_produk dari database
    $data = $koneksi->query("SELECT * FROM wishlist WHERE email_pelanggan='$email_pelanggan' AND id_produk='$_GET[id]'");
    
    $jum = mysqli_num_rows($data);

        if ($jum==1) {
            echo "<script>alert('Produk sudah ada di wishlist');</script>";
            echo "<script>location='wishlist.php';</script>";
        }
        else {
            $email_pelanggan = $_SESSION["pelanggan"]['email_pelanggan'];
            $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            $detail = $ambil->fetch_assoc();
        
            //menyimpan data ke dalam tabel wishlist
            $koneksi->query("INSERT INTO wishlist (email_pelanggan,id_produk) VALUES ('$email_pelanggan','$id_produk')");
        
            echo "<script>location='wishlist.php';</script>";
        }
?>