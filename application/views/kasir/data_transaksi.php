<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Transaksi</strong>
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
						<th>TOTAL HARGA</th>
						<th>PELAYAN</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($transaksi as $p): ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $p->namamenu ?></td>
						<td><?= rupiah($p->harga) ?></td>
						<td><?= $p->kode_meja ?></td>
						<td><?= $p->namapelanggan ?></td>
						<td><?= $p->jumlah ?></td>
						<td><?= rupiah($p->total) ?></td>
						<td><?= $p->namauser ?></td>
						<td><a href="" data-toggle="modal" data-target="#modal-bayar<?= $p->idtransaksi ?>" class="btn btn-primary btn-sm">Bayar</a></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</div>
			</table>
		</div>
	</div>

</div>

<?php foreach ($transaksi as $p): ?>
<div class="modal fade" id="modal-bayar<?= $p->idtransaksi ?>" aria-hidden="true" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Bayar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('kasir/transaksi/datatransaksi') ?>" method="post">
					<div class="row">
						<div class="col">
							<div class="form-group">
								<label>Nama pelanggan</label>
								<div class="input-group">
									<input type="hidden" name="idtransaksi" value="<?= $p->idtransaksi ?>">
									<input class="form-control" value="<?= $p->namapelanggan ?>" readonly>
								</div>
							</div>
						</div>
						<div class="col">
							<div class="form-group">
								<label>Kode meja</label>
								<div class="input-group">
									<input class="form-control" value="<?= $p->kode_meja ?>" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Total bayar</label>
						<div class="input-group">
							<input class="form-control" name="total" value="<?= $p->total ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label>Tanggal</label>
						<div class="input-group">
							<input class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>" readonly>
						</div>
					</div>
					<div class="form-group">
						<label>bayar</label>
						<div class="input-group">
							<input type="text" name="bayar" required class="form-control" placeholder="bayar" >
						</div>
					</div>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>