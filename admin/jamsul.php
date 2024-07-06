<h2>Data Penjemputan</h2>
<hr color="black">

<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<th>No</th>
			<th>Jam Penjemputan</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM jamsul"); ?>
		<?php while ($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['jam_penyusulan']; ?></td>
			<td>
                <a href="index.php?halaman=hapusjamsul&id=<?php echo $pecah['id_jamsul']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<a href="index.php?halaman=tambahjamsul" class="btn btn-primary">Tambah Data Penjemputan</a>