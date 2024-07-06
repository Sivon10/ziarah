<h2>Pembelian</h2>
<hr color="black">

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.email_pelanggan=pelanggan.email_pelanggan"); ?>
		<?php while($pecah = $ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td><?php echo $pecah['status_pembelian']; ?></td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>

				<?php if ($pecah['status_pembelian']=="sudah kirim pembayaran"): ?>
				<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-secondary">Konfirmasi Pembayaran</a>
				<?php endif ?>

				<?php if ($pecah['status_pembelian']=="lunas"): ?>
				<a href="index.php?halaman=detailpembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-success">Detail Pembayaran</a>
				<?php endif ?>

				<?php if ($pecah['status_pembelian']=="pending"): ?>
				<a href="index.php?halaman=batalpembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning" onclick="return confirm('Apakah anda yakin ingin membatalkan ini?')">Batalkan</a>
				<?php endif ?>

				<?php if ($pecah['status_pembelian']=="batal"): ?>
				<a href="index.php?halaman=hapuspembelian&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus ini?')">Hapus</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>