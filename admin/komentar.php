<h2>Komentar Produk</h2>
<hr color="black">

<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<th>No</th>
			<th>Email</th>
			<th>Nama Produk</th>
			<th>Komentar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
        <?php $ambil=$koneksi->query("SELECT * FROM komentar JOIN produk ON komentar.id_produk=produk.id_produk"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['komentar']; ?></td>
			<td>
				<a href="index.php?halaman=hapuskomentar&id=<?php echo $pecah['id_komentar']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>