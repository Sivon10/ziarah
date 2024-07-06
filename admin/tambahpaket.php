<h2>Tambah Paket Ziarah</h2>
<hr color="black">

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Rute Perjalanan</label>
		<textarea class="form-control" name="rute" rows="10"></textarea>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
if (isset($_POST['save'])) {
	$foto = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/" . $foto);
	$koneksi->query("INSERT INTO produk
			(nama_produk,harga_produk,foto_produk,deskripsi_produk,rute_perjalanan)
			VALUES ('$_POST[nama]','$_POST[harga]','$foto','$_POST[deskripsi]','$_POST[rute]')");

	echo "<br><div class='alert alert-info'>Data tersimpan</div>";
	echo "<meta http-equiv='refresh' content='l;url=index.php?halaman=produk'>";
}
?>