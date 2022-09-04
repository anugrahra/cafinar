<div class="row">
  <div class="col">
    <h3>Cicil piutang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg p-2" method="POST" action="<?= BASEURL; ?>/piutang/prosescicil">
      <input type="text" class="d-none" id="id" name="id" value="<?= $data['cicil']['id']; ?>">
      <input type="date" class="d-none" id="tanggal" name="tanggal" value="<?= $data['cicil']['tanggal']; ?>">
      <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <p><strong><?= date('d F Y', strtotime($data['cicil']['tanggal'])); ?></strong></p>
      </div>
      <div class="form-group">
        <label for="nominal">Nominal*</label>
        <p><strong>Rp. <?= number_format($data['cicil']['nominal']); ?></strong></p>
        <input type="number" class="d-none" id="nominal" name="nominal" value="<?= $data['cicil']['nominal']; ?>">
      </div>
      <div class="form-group">
        <label for="sumber">Debitur*</label>
        <p><strong><?= $data['cicil']['kepada']; ?></strong></p>
        <input type="text" class="d-none" id="sumber" name="sumber" value="Cicilan dari <?= $data['cicil']['kepada']; ?>">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <p><strong><?= $data['cicil']['keterangan']; ?></strong></p>
        <input type="text" class="d-none" id="keterangan" name="keterangan" value="<?= $data['cicil']['keterangan']; ?>">
      </div>
      <div class="form-group">
        <label for="tglcicil">Tanggal Cicil</label>
        <input type="date" class="form-control" id="tglcicil" name="tglcicil">
      </div>
      <div class="form-group">
        <label for="jumlahcicilan">Jumlah Cicilan</label>
        <input type="number" class="form-control" id="jumlahcicilan" name="jumlahcicilan">
      </div>
      <button type="submit" class="btn btn-primary">Cicil</button>
    </form>
  </div>
</div>