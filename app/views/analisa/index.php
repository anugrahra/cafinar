<div class="row">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-success font-weight-bold"><?= $data['tgl_sekarang']; ?></h4>
        <h3 class="text-primary font-weight-bold"><?= $data['sisa_hari']; ?> hari lagi menuju bulan baru</h3>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col">
    <div class="list-group list-group-horizontal-md text-center saldo">
      <div class="list-group-item list-group-item-action shadow p-3 rounded">
        <h4 class="text-dark font-weight-bold">Pengeluaran maksimal per hari</h4>
        <h3 class="text-info font-weight-bold">Rp. <?= number_format($data['pengeluaran_maks'], 2); ?></h3>
      </div>
    </div>
  </div>
</div>