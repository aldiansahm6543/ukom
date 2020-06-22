<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Data pesanan</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-6">
		<?php if (isset($pesanId)): ?>
			<form action="<?= base_url('waiter/pesanan/datapesanan/') . $pesanId->idpesanan ?>" method="post" class="shadow-sm p-3">

					<h3 class="mb-2 mt-2 text-center text-info">Edit data <?= $pesanId->idpesanan ?></h3>
				<div class="form-group">
					<label>Nama pelanggan</label>
					<div class="input-group">
						<input type="hidden" name="idpesanan" value="<?= $pesanId->idpesanan ?>">
						<input type="text" name="idpelanggan" class="form-control" value="<?= $pesanId->namapelanggan ?>" readonly>
					</div>
				</div>
				<div class="form-group">
					<label>Nama menu</label>
					<div class="input-group">
						<select name="idmenu" class="form-control">
							<?php foreach ($menu as $m): ?>
								<?php if ($pesanId->idmenu == $m->idmenu): ?>
									<option value="<?= $m->idmenu ?>" selected><?= $m->namamenu ?></option>
								<?php else: ?>
									<option value="<?= $m->idmenu ?>"><?= $m->namamenu ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>jumlah</label>
					<div class="input-group">
						<input type="text" name="jumlah" class="form-control" value="<?= $pesanId->jumlah ?>">
					</div>
				</div>
				<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
			</form>
		<?php endif; ?>
		</div>
		<div class="col-lg-12">
			
			<?= $this->session->flashdata('pesan'); ?>
			<div class="table-responsive">
			<table class="table table-striped table-bordered">
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
						<td><a href="<?= base_url('waiter/pesanan/datapesanan/') . $p->idpesanan ?>" class="btn btn-warning btn-sm">Edit</a>
							<button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="if(confirm('yakin ingin menghapus pesanan <?= $p->idpesanan; ?>?')) 
                            window.location.href='<?= base_url('waiter/pesanan/hapus/') . $p->idpesanan ?>';">Hapus</button></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
				</div>
		</div>
	</div>



</div>