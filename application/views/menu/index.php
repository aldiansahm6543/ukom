<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Data Menu</strong>
		</div>
	</div>
	<div class="row">
		<div class="col-4">
			<?php if (isset($menuid)): ?>
			<form action="<?= base_url('menu/index/') . $menuid->idmenu ?>" method="post" class="shadow-sm p-3">
				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-info">Edit data <?= $menuid->namamenu ?></h3>
					<label>Nama menu</label>
					<div class="input-group">
						<input type="text" name="namamenu" class="form-control" value="<?= $menuid->namamenu ?>" >
						<?= form_error('namamenu', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<div class="input-group">
						<input type="text" name="harga" class="form-control" value="<?= $menuid->harga ?>">
						<?= form_error('harga', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<button type="submit" name="edit" class="btn btn-primary">Simpan</button>
			</form>
			<?php else: ?>
			<form action="<?= base_url('menu') ?>" method="post" class="shadow-sm p-3">
				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-info">Tambah data</h3>
					<label>Nama menu</label>
					<div class="input-group">
						<input type="text" name="namamenu" class="form-control" placeholder="Masukan namamenu..">
						<?= form_error('namamenu', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Harga</label>
					<div class="input-group">
						<input type="text" name="harga" class="form-control" placeholder="Masukan harga..">
						<?= form_error('harga', '<small class="form-text text-danger">', '</small>') ?>
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
						<th>NAMA MENU</th>
						<th>HARGA</th>
						<th>AKSI</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					 foreach ($menu as $m): ?>
						
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $m->namamenu ?></td>
						<td><?= rupiah($m->harga) ?></td>
						<td><a href="<?= base_url('menu/index/') . $m->idmenu ?>" class="btn btn-warning btn-sm">Edit</a>
							<button type="submit" class="btn btn-danger btn-sm" 
                                    onclick="if(confirm('yakin ingin menghapus menu <?= $m->namamenu; ?>?')) 
                            window.location.href='<?=base_url('menu/hapus/') . $m->idmenu; ?>';">Hapus</button></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</div>
			</table>
		</div>
	</div>



</div>