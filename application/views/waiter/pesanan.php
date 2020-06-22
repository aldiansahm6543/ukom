<div class="container">

	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Pilih pesanan</strong>
		</div>
	</div>
	<div class="col-lg-12">
		
	<div class="row mt-5">
		<?php foreach ($menu as $m): ?>
		<div class="col-lg-3 mb-4">
			<div class="card" style="width: 16rem;">
			  <img src="<?= base_url('assets/img/menu/') ?>mie_goreng.jpg"  class="card-img-top" img-fluid >
			  <div class="card-body">
			    <h5 class="card-title text-uppercase"><?= $m->namamenu ?></h5>
			    <p class="card-text text-danger"><?= rupiah($m->harga) ?></p>
			    <a href="<?= base_url('waiter/pesanan/buatpesanan/') . $m->idmenu ?>" class="btn btn-primary">Buat pesanan</a>
			  </div>
			</div>
		</div>
		<?php endforeach ?>

	</div>


	</div>
</div>



