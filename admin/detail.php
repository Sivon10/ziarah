<h2>Detail Pembelian</h2>
<hr color="black">

<?php
	$ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
		ON pembelian.email_pelanggan=pelanggan.email_pelanggan
		WHERE pembelian.id_pembelian='$_GET[id]'");
	$detail = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-4">
		<h4>Pembelian</h4>
		Tanggal: <?php echo $detail['tanggal_pembelian']; ?> <br>
		Total: Rp. <?php echo number_format($detail['total_pembelian']); ?> <br>
		Status: <?php echo $detail['status_pembelian']; ?>
	</div>
	<div class="col-md-4">
		<h4>Pelanggan</h4>
		<strong>Nama: <?php echo $detail['nama_pelanggan']; ?></strong> <br>
		<?php echo $detail['telepon_pelanggan']; ?> <br>
		<?php echo $detail['email_pelanggan']; ?>
	</div>
	<div class="col-md-3 vl">
		<h4>Penjemputan</h4>
		<strong><?php echo $detail['tgl_penyusulan']; ?></strong> <br>
		Jam Penjemputan: <?php echo $detail['jam_penyusulan']; ?> <br>
		Alamat: <?php echo $detail['alamat_penyusulan']; ?>
	</div>
</div>
<br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Paket</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk
			ON pembelian_produk.id_produk=produk.id_produk
			WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
		<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
			<td><?php echo $pecah['jumlah']; ?></td>
			<td>
				Rp. <?php echo number_format($pecah['harga_produk']*$pecah['jumlah']); ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>