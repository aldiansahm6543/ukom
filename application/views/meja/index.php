<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Data meja</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<?php if (isset($mejaid)): ?>
			<form action="<?= base_url('meja/index/') . $mejaid->id_meja ?>" method="post" class="shadow-sm p-3">
				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-info">Edit data <?= $mejaid->kode_meja ?></h3>
					<label>Nama meja</label>
					<div class="input-group">
						<input type="text" name="kode_meja" class="form-control" value="<?= $mejaid->kode_meja ?>" >
						<?= form_error('kode_meja', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
			</form>
			<?php else: ?>
			<form action="<?= base_url('meja') ?>" method="post" class="shadow-sm p-3">
				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-info">Tambah data</h3>
					<label>Nama meja</label>
					<div class="input-group">
						<input type="text" name="kode_meja" class="form-control" placeholder="Masukan kode_meja..">
						<?= form_error('kode_meja', '<small class="form-text text-danger">', '</small>') ?>
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
						<th>KODE MEJA</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($meja as $m): ?>
						
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $m->kode_meja ?></td>
						<td><a href="<?= base_url('meja/index/') . $m->id_meja ?>" class="btn btn-warning btn-sm">Edit</a>
							<button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="if(confirm('yakin ingin menghapus meja <?= $m->kode_meja; ?>?')) 
                            window.location.href='<?=base_url('meja/hapus/') . $m->id_meja; ?>';">Hapus</button></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</div>
			</table>
		</div>
	</div>



</div>