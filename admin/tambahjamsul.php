<h2>Tambah Data Penjemputan</h2>
<hr color="black">

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Jam Penjemputan</label>
		<input type="time" class="form-control" name="nama">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php
	if (isset($_POST['save'])) {

		$time = $_POST['nama'];

		$query = "INSERT INTO jamsul (jam_penyusulan) VALUES ('$time')";
		$query_run = mysqli_query($koneksi, $query);

		if($query_run)
		{
			echo "<br><div class='alert alert-info'>Data tersimpan</div>";
		}
		else
		{
			echo "<br><div class='alert alert-info'>Data gagal disimpan</div>";
		}
	}
?>