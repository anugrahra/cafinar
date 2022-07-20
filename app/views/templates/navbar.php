<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light shadow">
  <a class="navbar-brand" href="<?= BASEURL; ?>">
    <i>CAFIN</i><b>AR</b>
  </a>
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-item nav-link" href="<?= BASEURL; ?>">Beranda</a>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pemasukan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/pemasukan">Daftar Pemasukan</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/pemasukan/tambah">Tambah Pemasukan</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/pemasukan/statistik">Statistik</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Pengeluaran
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/pengeluaran">Daftar Pengeluaran</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/pengeluaran/tambah">Tambah Pengeluaran</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/pengeluaran/statistik">Statistik</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Piutang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/piutang">Daftar Piutang</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/piutang/tambah">Tambah Piutang</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/piutang/dibayar">Dibayar</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Hutang
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/hutang">Daftar Utang</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/hutang/tambah">Tambah Utang</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/hutang/bayar">Bayar</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Emas
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/emas">Daftar Emas</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/emas/beli">Beli</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/emas/jual">Jual</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/emas/info">Info</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Tabungan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/tabungan">Buku Tabungan</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/tabungan/nabung">Nabung</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/tabungan/narik">Narik</a>
          </div>
        </div>
        <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reksadana
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?= BASEURL; ?>/reksadana">Log Investasi</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/reksadana/invest">Invest</a>
            <a class="dropdown-item" href="<?= BASEURL; ?>/reksadana/jual">Jual</a>
          </div>
        </div>
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/analisa">Analisa</a>
        <a class="nav-item nav-link" href="<?= BASEURL; ?>/statistik">Stats</a>
        <a class="nav-item nav-link text-danger" href="<?= BASEURL; ?>/auth/signout">Logout</a>
      </div>
    </div>
  </div>
</nav>
<!-- akhir navbar -->

<main role="main" class="mb-3 mt-3">
  <div class="container">