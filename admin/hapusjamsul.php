<?php
	
	$ambil = $koneksi->query("SELECT * FROM jamsul WHERE id_jamsul='$_GET[id]'");

	$koneksi->query("DELETE FROM jamsul WHERE id_jamsul='$_GET[id]'");

	echo "<script>location='index.php?halaman=jamsul';</script>"
?>