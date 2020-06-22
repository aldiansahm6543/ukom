<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">DATA LAPORAN TRANSAKSI</strong>
		</div>
		<div class="col-lg-1 ">
			<a href="<?= base_url('laporan/cetakLaporan') ?>" target="_blank" class="btn btn-dark btn-sm">CETAK</a>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<form action="<?= base_url('laporan/cetakTanggal') ?>" method="post">
				<div class="input-group mb-3">
	   			<input type="date" class="form-control" name="tanggal" aria-label="Recipient's username" aria-describedby="basic-addon2">
			  <div class="input-group-append">
			    <button type="submit" class="btn btn-primary" id="basic-addon2">Cetak</button>
			  </div>
			</form>
		</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			
			<?= $this->session->flashdata('pesan'); ?>
				<div class="table-responsive">
			<table class="table table-striped table-bordered mb-5">
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
						<?php if ($this->session->userdata('level') == 'kasir'): ?>	
						<th>PRINT</th>	
						<?php endif; ?>
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
						<?php if ($this->session->userdata('level') == 'kasir'): ?>	
						<td><a href="<?= base_url('laporan/cetakStruk/') . $p->idtransaksi ?>" target="_blank" class="btn btn-primary btn-sm">Cetak struk</a></td>
						<?php endif; ?>
					</tr>
					<?php endforeach; ?>
				</tbody>
				<tfoot >
					<tr >
						<th colspan="5" class="text-center">TOTAL HARGA </th>
						<th class="text-center">:</th>
						<th colspan="5"><?= rupiah($total) ?> </th>
					</tr>
				</tfoot>
			</table>
				</div>
		</div>
	</div>

</div>