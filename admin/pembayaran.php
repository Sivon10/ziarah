<h2>Konfirmasi Pembayaran</h2>
<hr color="black">

<?php
//mendapatkan id pembelian dari url
$id_pembelian = $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM pembayaran WHERE id_pembelian='$id_pembelian'");
$detail = $ambil->fetch_assoc();

//mendapatkan id_pembelian dari url
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$id_pembelian'");
$detpem = $ambil->fetch_assoc();

$ambil=$koneksi->query("SELECT * FROM pembelian JOIN pelanggan 
	ON pembelian.email_pelanggan=pelanggan.email_pelanggan");
$pecah = $ambil->fetch_assoc();
?>

<div class="row">
	<div class="col-md-6">
		<table class="table table-bordered">
			<tr>
				<th>Nama</th>
				<td><?php echo $pecah['nama_pelanggan']; ?></td>
			</tr>
			<tr>
				<th>Bank</th>
				<td><?php echo $detail['bank']; ?></td>
			</tr>
			<tr>
				<th>Jumlah</th>
				<td>Rp. <?php echo number_format($detpem['total_pembelian']); ?></td>
			</tr>
			<tr>
				<th>Tanggal</th>
				<td><?php echo $detail['tanggal']; ?></td>
			</tr>
		</table>
	</div>
	<div class="col-md-6">
		<label>Foto Bukti Pembayaran</label>
		<img class="img-fluid img-thumbnail" src="../bukti_pembayaran/<?php echo $detail['bukti']; ?>">
	</div>
</div>

<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select class="form-control" name="status">
			<option value="">Pilih Status</option>
			<option value="lunas">Lunas</option>
			<option value="batal">Batal</option>
		</select>
	</div>
	<button class="btn btn-primary" name="proses">Proses</button>
</form>

<?php
if (isset($_POST["proses"])) {
	$resi = $_POST["resi"];
	$status = $_POST["status"];
	$koneksi->query("UPDATE pembelian SET status_pembelian='$status' WHERE id_pembelian='$id_pembelian'");

	echo "<script>location='index.php?halaman=pembelian';</script>";
}
?>