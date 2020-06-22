<nav class="navbar navbar-expand-lg navbar-light  shadow-sm">
  <a class="navbar-brand text-primary"><strong>TABLESERVICE</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <div class="navbar-nav mr-auto">
      <?php if ($this->session->userdata('level') == 'owner'): ?>
        <a href="<?= base_url('owner/dashboard') ?>" class="nav-item nav-link active" href="#">Home</a> 
      <?php endif ?>
      <?php if ($this->session->userdata('level') == 'kasir'): ?>
        <a href="<?= base_url('kasir/dashboard') ?>" class="nav-item nav-link active" href="#">Home</a> 
      <?php endif ?>
      <?php if ($this->session->userdata('level') == 'waiter'): ?>
        <a href="<?= base_url('waiter/dashboard') ?>" class="nav-item nav-link active" href="#">Home</a> 
      <?php endif ?>
      <?php if ($this->session->userdata('level') == 'administrator'): ?>
        <a href="<?= base_url('administrator') ?>" class="nav-item nav-link active" href="#">Home</a> 
      <?php endif ?>
       
        <?php if ($this->session->userdata('level') == 'administrator'): ?>
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Data Entri
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('meja') ?>">Entri meja</a>
            <a class="dropdown-item" href="<?= base_url('menu') ?>">Entri menu</a>
          </div>
        </li>
        <?php elseif($this->session->userdata('level') == 'waiter'): ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pesanan
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('waiter/pesanan') ?>">Entri pesanan</a>
            <a class="dropdown-item" href="<?= base_url('waiter/pesanan/datapesanan') ?>">Data pesanan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          pelanggan
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= base_url('waiter/pelanggan') ?>">Entri pelanggan</a>
          </div>
        </li>
        <?php elseif($this->session->userdata('level') == 'kasir'): ?>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaksi
        </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= base_url('kasir/transaksi/datatransaksi') ?>">Data transaksi</a>
            <a class="dropdown-item" href="<?= base_url('kasir/transaksi') ?>">Entri transaksi</a>
          </div>
      </li>
        <?php endif ?>
      <?php if ($this->session->userdata('level') != 'administrator'): ?>
        <a class="nav-item nav-link" href="<?= base_url('laporan') ?>">Laporan</a>
        
      <?php endif ?>
    </div>
    <span class="navbar-text">
      <div class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white btn btn-dark btn-sm" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?= $this->session->userdata('namauser'); ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
        </div>
      </div>
    </span>
  </div>
</nav>