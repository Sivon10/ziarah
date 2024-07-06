<h2>Pelanggan</h2>
<hr color="black">

<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['email_pelanggan']; ?></td>
			<td><?php echo $pecah['telepon_pelanggan']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&email=<?php echo $pecah['email_pelanggan']; ?>" class="btn btn-danger"onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>