<?php
	$ambil = $koneksi->query("SELECT * FROM komentar WHERE id_komentar='$_GET[id]'");

	$koneksi->query("DELETE FROM komentar WHERE id_komentar='$_GET[id]'");

	echo "<script>location='index.php?halaman=komentar';</script>"
?>