<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin-top: 10%;">
	<div class="col-md-12">
			
		<div class="row">
			<div class="col-md-5 mx-auto" >
		<div class="p-5 shadow bg-light" border="1">
			<?= $this->session->flashdata('pesan'); ?>
			<form action="<?= base_url('auth'); ?>" method="post">	
				<div class="form-group">
					<h3 class="mb-2 mt-2 text-center text-dark">Login</h3>
					<label>Email</label>
					<div class="input-group">
						<div class="input-group-prepend">
				          <div class="input-group-text">@</div>
				        </div>
						<input type="text" name="email" class="form-control" placeholder="Masukan email..">
					</div>
						<?= form_error('email', '<small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="form-group">
					<label>Password</label>
					<div class="input-group">
						<div class="input-group-prepend">
				          <div class="input-group-text">*</div>
				        </div>
					<input type="password" name="password" class="form-control" placeholder="Password..">
					</div>
					<?= form_error('password', '<small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="form-group">
					<label>Pilih level</label>
					<div class="input-group ">
						<select name="level" class="form-control">
							<option value="" selected disabled>- Masuk sebagai -</option>
							<option value="owner">Owner</option>
							<option value="administrator">Administrator</option>
							<option value="waiter">Waiter</option>
							<option value="kasir">Kasir</option>
						</select>
					</div>
					<?= form_error('level', '<small class="form-text text-danger">', '</small>') ?>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block rounded-pill">Login</button>
				</div>
			</form>	
			</div>
		</div>
		</div>
	</div>
</div> 




<script src="<?= base_url('assets/') ?>bootstrap/js/jquery-3.4.1.js" ></script>
<script src="<?= base_url('assets/') ?>bootstrap/js/popper.min.js"></script>
<script src="<?= base_url('assets/') ?>bootstrap/js/bootstrap.min.js"></script>
</body>
</html>