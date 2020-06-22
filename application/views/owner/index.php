<div class="container">
	
	<div class="row mt-5 bg-info p-2 rounded mb-4">
		<div class="col">
		 	<strong class="h3 text-white ">Welcome <b><?= $this->session->userdata('namauser'); ?></b></strong>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-3">
			<div class="card border-primary shadow mb-3" style="max-width: 18rem;">
			  <div class="card-header text-uppercase"><strong>Transaksi</strong></div>
			  <div class="card-body text-primary">
			    <h5 class="card-title">Total : <?= $total_transaksi ?></h5>
			    <p class="card-text"></p>
			  </div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card border-success shadow mb-3" style="max-width: 18rem;">
			  <div class="card-header text-uppercase"><strong>Pelanggan</strong></div>
			  <div class="card-body text-success">
			    <h5 class="card-title">Total : <?= $total_pelanggan ?></h5>
			    <p class="card-text"></p>
			  </div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card border-primary shadow mb-3" style="max-width: 18rem;">
			  <div class="card-header text-uppercase"><strong>menu</strong></div>
			  <div class="card-body text-primary">
			    <h5 class="card-title">Total : <?= $total_menu ?></h5>
			    <p class="card-text"></p>
			  </div>
			</div>
		</div>
		<div class="col-lg-3">
			<div class="card border-primary shadow mb-3" style="max-width: 18rem;">
			  <div class="card-header text-uppercase"><strong>meja</strong></div>
			  <div class="card-body text-primary">
			    <h5 class="card-title">Total : <?= $total_meja ?></h5>
			    <p class="card-text"></p>
			  </div>
			</div>
		</div>
	</div>

</div>