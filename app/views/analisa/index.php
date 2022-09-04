<div class="row">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-success font-weight-bold"><?= $data['tgl_sekarang']; ?></h4>
        <h3 class="text-primary font-weight-bold"><?= $data['sisa_hari']; ?> hari lagi menuju bulan <?= date('F', strtotime('first day of +1 month'));; ?></h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Hari ini boleh menghabiskan uang sebanyak :</h4>
        <h3 class="text-info font-weight-bold">Rp. <?= number_format($data['pengeluaran_maks']); ?></h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <div id="piechartcontainer">
          <canvas id="piechart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>