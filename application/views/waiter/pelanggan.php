<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Data pelanggan</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<?php if (isset($pelangganId)): ?>
			<form action="<?= base_url('waiter/pelanggan/index/') . $pelangganId->idpelanggan ?>" method="post" class="shadow-sm p-3">
					<h3 class="mb-2 mt-2 text-center text-info">Edit data</h3>
				<div class="form-group">
					<label>Nama pelanggan</label>
					<div class="input-group">
						<input type="text" name="namapelanggan" class="form-control" value="<?= $pelangganId->namapelanggan ?>">
						<?= form_error('namapelanggan', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Jenis kelamin</label>
					<div class="input-group">
						<select name="jeniskelamin" class="form-control"> 
							<?php foreach ($jeniskelamin as $j): ?>
								<?php if ($j == $pelangganId->jeniskelamin): ?>
									<option value="<?= $j ?>" selected><?= $j ?></option>
								<?php else: ?>
									<option value="<?= $j ?>"><?= $j ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>No hp</label>
					<div class="input-group">
						<input type="text" name="nohp" class="form-control" value="<?= $pelangganId->nohp ?>">
						<?= form_error('nohp', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<div class="input-group">
						<input type="text" name="alamat" class="form-control" value="<?= $pelangganId->alamat ?>">
						<?= form_error('alamat', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
			<?php else: ?>
			<form action="<?= base_url('waiter/pelanggan') ?>" method="post" class="shadow-sm p-3">
					<h3 class="mb-2 mt-2 text-center text-info">Tambah data</h3>
				<div class="form-group">
					<label>Nama pelanggan</label>
					<div class="input-group">
						<input type="text" name="namapelanggan" class="form-control" placeholder="Masukan namapelanggan..">
						<?= form_error('namapelanggan', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Jenis kelamin</label>
					<div class="input-group">
						<select name="jeniskelamin" class="form-control"> 
							<option value="" selected disabled>- Pilih jenis kelamin -</option>
							<option value="Laki-laki">Laki-laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label>No hp</label>
					<div class="input-group">
						<input type="text" name="nohp" class="form-control" placeholder="Masukan nohp..">
						<?= form_error('nohp', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<div class="input-group">
						<input type="text" name="alamat" class="form-control" placeholder="Masukan alamat..">
						<?= form_error('alamat', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
				
			<?php endif ?>
		</div>
		<div class="col-8">
			<?= $this->session->flashdata('pesan'); ?>
			<table class="table table-striped table-bordered">
				<div class="table-responsive">
				<thead>
					<tr>
						<th>NO</th>
						<th>NAMA PELANGGAN</th>
						<th>JENIS KELAMIN</th>
						<th>NO HP</th>
						<th>ALAMAT</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($pelanggan as $p): ?>
						
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $p->namapelanggan ?></td>
						<td><?= $p->jeniskelamin ?></td>
						<td><?= $p->nohp ?></td>
						<td><?= $p->alamat ?></td>
						<td><a href="<?= base_url('waiter/pelanggan/index/') . $p->idpelanggan ?>" class="btn btn-warning btn-sm">Edit</a>
							<button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="if(confirm('yakin ingin menghapus pelanggan <?= $p->namapelanggan; ?>?')) 
                            window.location.href='<?=base_url('waiter/pelanggan/hapus/') . $p->idpelanggan; ?>';">Hapus</button></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</div>
			</table>
		</div>
	</div>



</div>