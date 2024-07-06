<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$_GET[id]'");

	$koneksi->query("DELETE FROM pembelian WHERE id_pembelian='$_GET[id]'");

	echo "<script>location='index.php?halaman=pembelian';</script>"
?>