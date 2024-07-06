<h2>Paket Ziarah</h2>
<hr color="black">

<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Rute Perjalanan</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM produk"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama_produk']; ?></td>
				<td><?php echo $pecah['harga_produk']; ?></td>
				<td><?php echo $pecah['rute_perjalanan']; ?></td>
				<td>
					<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
				</td>
				<td>
					<a href="index.php?halaman=ubahpaket&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Ubah</a>
					<a href="index.php?halaman=hapuspaket&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahpaket" class="btn btn-primary">Tambah Paket Ziarah</a>