<?php
$semuadata=array();
$tgl_mulai="-";
$tgl_selesai="-";
if (isset($_POST["kirim"])) {
	$tgl_mulai = $_POST["tglm"];
	$tgl_selesai = $_POST["tgls"];
	$ambil = $koneksi->query("SELECT * FROM pembelian LEFT JOIN pelanggan 
		ON pembelian.email_pelanggan=pelanggan.email_pelanggan 
		WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai'");
	while($pecah = $ambil->fetch_assoc()) {
		$semuadata[]=$pecah;
	}
}
?>

<h2>Laporan Pembelian dari <?php echo $tgl_mulai ?> hingga <?php echo($tgl_selesai) ?></h2>
<hr color="black">

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>&nbsp;</label><br>
				<button class="btn btn-primary" name="kirim">Lihat</button>
			</div>
		</div>
	</div>
</form>

<table class="table table-bordered table-responsive-md">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian']; ?>

		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"]; ?></td>
			<td><?php echo $value["tanggal_pembelian"]; ?></td>
			<td><?php echo number_format($value["total_pembelian"]); ?></td>
			<td><?php echo $value["status_pembelian"]; ?></td>
		</tr>

		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th colspan="2">Rp. <?php echo number_format($total) ?></th>
		</tr>
	</tfoot>
</table>