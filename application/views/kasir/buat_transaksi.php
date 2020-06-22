<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Entri Transaksi</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			
			<?= $this->session->flashdata('pesan'); ?>
			<table class="table table-striped table-bordered">
				<div class="table-responsive">
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA MENU</th>
						<th>HARGA</th>
						<th>KODE MEJA</th>
						<th>NAMA PELANGGAN</th>
						<th>JUMLAH</th>
						<th>PELAYAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($pesanan as $p): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $p->namamenu ?></td>
						<td><?= rupiah($p->harga) ?></td>
						<td><?= $p->kode_meja ?></td>
						<td><?= $p->namapelanggan ?></td>
						<td><?= $p->jumlah ?></td>
						<td><?= $p->namauser ?></td>
						<td><a href="" data-toggle="modal" data-target="#modal-transaksi<?= $p->idpesanan ?>" class="btn btn-primary btn-sm">Buat transaksi</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</div>
			</table>
		</div>
	</div>

<?php foreach ($pesanan as $p): ?>
<div class="modal fade" id="modal-transaksi<?= $p->idpesanan ?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Entri transaksi</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('kasir/transaksi') ?>" method="post" >
					<div class="form-group">
						<label>Nama pelanggan</label>
						<div class="input-group">
							<input type="hidden" name="id_meja" value="<?= $p->id_meja ?>">
							<input type="hidden" name="idpesanan" value="<?= $p->idpesanan ?>">
							<input type="text" value="<?= $p->namapelanggan ?>" class="form-control" readonly>
						</div>
					</div>
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama menu</label>
								<div class="input-group">
									<input type="text" value="<?= $p->namamenu ?>" class="form-control" readonly>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Jumlah</label>
								<div class="input-group">
									<input type="text" value="<?= $p->jumlah ?>" class="form-control" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group" align="center">
						<label>Total harga</label>
						<div class="input-group col-8 ">
							<input type="text" name="total" value="<?= $p->jumlah * $p->harga ?>" class="form-control" readonly>
						</div>
					</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>

</div>
<?php endforeach; ?>



</div>