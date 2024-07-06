<h2>Ubah Produk</h2>
<hr color="black">

<?php
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>">
	</div>
	<div class="form-group">
		<img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200">
	</div>
	<div class="form-group">
		<label>Ganti Foto</label>
		<input type="file" name="foto" class="form-control">
	</div>
	<div class="form-group">
		<label>Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<div class="form-group">
		<label>Rute Perjalanan</label>
		<textarea name="rute" class="form-control" rows="10"><?php echo $pecah['rute_perjalanan']; ?></textarea>
	</div>
	<button class="btn btn-primary" name="ubah" onclick="return confirm('Apakah anda yakin ingin menyimpan perubahan ini?')">Ubah</button>
</form>

<?php
if (isset($_POST['ubah'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	//jk foto dirubah

	if (!empty($lokasifoto)) {
		move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
				foto_produk='$namafoto',deskripsi_produk='$_POST[deskripsi]',rute_perjalanan='$_POST[rute]'
				WHERE id_produk='$_GET[id]'");
	} else {
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]',harga_produk='$_POST[harga]',
				deskripsi_produk='$_POST[deskripsi]',rute_perjalanan='$_POST[rute]'
				WHERE id_produk='$_GET[id]'");
	}

	echo "<script>location='index.php?halaman=produk';</script>";
}
?>