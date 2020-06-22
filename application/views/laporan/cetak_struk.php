<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
	<style>
		.container {
			margin: 200px 50px 50px ; 
		}
	</style>
</head>
<body>

<div class="container">
<div class="row justify-content-center">
	<div class="col-4 text-center">
		<h3 class="">Struk transaksi</h3>
	<hr>
	</div>
</div>

	<div class="row justify-content-center" style="font-size: 20pt;">
		<div class="col-3">
			<table>
			<tr>
				<td>Nama</td>
			</tr>
			<tr>
				<td>Menu</td>
			</tr>
			<tr>
				<td>Jumlah</td>
			</tr>
			<tr>
				<td>Total harga</td>
			</tr>
			<tr>
				<td>Total bayar</td>
			</tr>
			<tr>
				<td>Kembalian</td>
			</tr>
			<tr>
				<td>Tanggal</td>
			</tr>
		</table>
		</div>
		<div class="col-1">
			<table>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>
			<tr>
				<td>:</td>
			</tr>

		</table>
		</div>
		<div class="col-3">
			<table>
			<tr>
				<td><?= $laporan->namapelanggan ?></td>
			</tr>
			<tr>
				<td><?= $laporan->namamenu ?></td>
			</tr>
			<tr>
				<td><?= $laporan->jumlah ?></td>
			</tr>
			<tr>
				<td><?= rupiah($laporan->total) ?></td>
			</tr>
			<tr>
				<td><?= rupiah($laporan->bayar) ?></td>
			</tr>
			<tr>
				<td><?= rupiah($laporan->kembali) ?></td>
			</tr>
			<tr>
				<td><?= $laporan->tanggal ?></td>
			</tr>
			</table>
		</div>
		<div class="row mt-4 text-success">
			Terimakasi sudah makan direstoran kami : )
		</div>
	</div>

	

</div>
			<script>window.print();</script>