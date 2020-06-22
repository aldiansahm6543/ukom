<!DOCTYPE html>
<html>
<head>
	<title><?= $title ?></title>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
	<style>
		.container {
			margin: 50px 50px 50px ; 
		}
	</style>
</head>
<body>

<div class="container">
	
<h3 class="">Laporan data transaksi</h3>
<span>Tanggal : <?= $tanggal ?></span>
<hr>
<table class="table table-striped table-bordered">
				<div class="table-responsive">
				<thead>
					<tr>
						<th>TANGGAL</th>
						<th>NAMA MENU</th>
						<th>HARGA</th>
						<th>KODE MEJA</th>
						<th>NAMA PELANGGAN</th>
						<th>JUMLAH</th>
						<th>TOTAL HARGA</th>
						<th>BAYAR</th>
						<th>KEMBALI</th>
						<th>NAMA WAITER</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($laporan as $p): ?>
					<tr>
						<td><?= $p->tanggal ?></td>
						<td><?= $p->namamenu ?></td>
						<td><?= rupiah($p->harga) ?></td>
						<td><?= $p->kode_meja ?></td>
						<td><?= $p->namapelanggan ?></td>
						<td><?= $p->jumlah ?></td>
						<td><?= rupiah($p->total) ?></td>
						<td><?= rupiah($p->bayar) ?></td>
						<td><?= rupiah($p->kembali) ?></td>
						<td><?= $p->namauser ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot>
					<tr >
						<th colspan="5" class="text-center">TOTAL HARGA </th>
						<th class="text-center">:</th>
						<th colspan="5"><?= rupiah($total) ?> </th>
					</tr>
				</tfoot>
				</div>
			</table>

</div>
			<script>window.print();</script>