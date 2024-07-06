<?php
session_start();
include "koneksi.php";
			if (isset($_POST["kirim"])) {
				$id_produk = $_GET["id"];
				$email_pelanggan = $_SESSION["pelanggan"]["email_pelanggan"];
				$komentar = $_POST['komentar'];

				//menyimpan data ke dalam tabel umpanbalik
				$query="INSERT INTO komentar (id_produk,email_pelanggan,komentar) VALUES ('$id_produk','$email_pelanggan','$komentar')";
				$hasil=mysqli_query($koneksi,$query);
				
				if($hasil){
					header('location:detail_paket.php?id='.$id_produk);
				}
				
			}
		?>