<div class="row">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h1 class="text-success font-weight-bold">Rp. <?= number_format($data['saldo']['saldo']); ?></h1>
        <small>
          <p>Saldo</p>
        </small>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center">
      <a href="<?= BASEURL; ?>/emas" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h1 class="text-warning font-weight-bold"><?= number_format($data['emas']['total']); ?> gr</h1>
        <small>
          <p>Investasi Emas</p>
        </small>
      </a>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center">
      <a href="<?= BASEURL; ?>/piutang" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h1 class="text-primary font-weight-bold">Rp. <?= number_format($data['piutang']['total']); ?></h1>
        <small>
          <p>Piutang</p>
        </small>
      </a>
      <a href="<?= BASEURL; ?>/hutang" class="list-group-item list-group-item-action shadow p-3 rounded">
        <h1 class="text-danger font-weight-bold">Rp. <?= number_format($data['hutang']['total']); ?></h1>
        <small>
          <p>Hutang</p>
        </small>
      </a>
    </div>
  </div>
</div>