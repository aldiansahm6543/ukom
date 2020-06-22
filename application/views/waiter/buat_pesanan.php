<div class="container">

	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Buat pesanan</strong>
		</div>
	</div>
	<div class="col-lg-12">
		
	<div class="row mt-5  justify-content-center d-flex shadow-sm" border="1">
		<div class="col-lg-4">
			<div class="card mt-3 float-right" style="width: 18rem;">
			  <img src="<?= base_url('assets/img/menu/') ?>mie_goreng.jpg"  class="card-img-top" img-fluid >
			  <div class="card-body">
			    <h5 class="card-title text-uppercase"><?= $menu->namamenu ?></h5>
			    <p class="card-text text-danger"><?= rupiah($menu->harga) ?></p>
			  </div>
			</div>
		</div>
		<div class="col-lg-6">
			<form action="<?= base_url('waiter/pesanan/buatpesanan/') . $menu->idmenu ?>" method="post" class="shadow-sm p-3">
				<div class="form-group">
					<label>Kode meja</label>
					<div class="input-group">
						<select name="id_meja" class="form-control">
							<option value="" selected disabled>- Pilih meja tersedia-</option>
							<?php foreach ($meja as $m): ?>
								<?php if ($m->status == 0): ?>
								<option value="<?= $m->id_meja ?>"><?= $m->kode_meja ?></option>
								<?php else: ?>
								<?php endif ?>
							<?php endforeach ?>
						</select>
						<?= form_error('id_meja', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Pelanggan</label>
					<div class="input-group">
						<select name="idpelanggan" class="form-control">
							<option value="" selected disabled>- Pilih pelanggan -</option>
							<?php foreach ($pelanggan as $p): ?>
								<option value="<?= $p->idpelanggan ?>"><?= $p->namapelanggan ?></option>
							<?php endforeach ?>
						</select>
						<?= form_error('idpelanggan', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="form-group">
					<label>Jumlah</label>
					<div class="input-group">
						<input type="number" name="jumlah" class="form-control" placeholder="Masukan jumlah">
						<?= form_error('jumlah', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<button type="submit" class="btn btn-primary">Simpan</button>
			</form>
		</div>
	</div>
	</div>





</div>