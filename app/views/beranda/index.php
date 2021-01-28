<div class="row">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Saldo</h4>
        <h1 class="text-success font-weight-bold">Rp <?= number_format($data['saldo']['saldo'], 2); ?></h1>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center">
      <a href="<?= BASEURL; ?>/tabungan" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Tabungan</h4>
        <h1 class="text-info font-weight-bold">Rp <?= number_format($data['tabungan']['total'], 2); ?></h1>
      </a>
      <a href="<?= BASEURL; ?>/reksadana" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Investasi Reksadana</h4>
        <h1 class="text-secondary font-weight-bold">Rp <?= number_format(99999, 2); ?></h1>
      </a>
      <a href="<?= BASEURL; ?>/emas" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Emas</h4>
        <h1 class="text-warning font-weight-bold"><?= number_format($data['emas']['total'], 2); ?> gr</h1>
      </a>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center">
      <a href="<?= BASEURL; ?>/piutang" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Piutang</h4>
        <h1 class="text-primary font-weight-bold">Rp <?= number_format($data['piutang']['total'], 2); ?></h1>
      </a>
      <a href="<?= BASEURL; ?>/hutang" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Hutang</h4>
        <h1 class="text-danger font-weight-bold">Rp <?= number_format($data['hutang']['total'], 2); ?></h1>
      </a>
    </div>
  </div>
</div>