<div class="row">
  <div class="col">
    <h3>Jual Emas</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg p-2" method="POST" action="<?= BASEURL; ?>/emas/prosesjual">
      <div class="form-group">
        <label for="tanggal">Tanggal*</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
      </div>
      <div class="form-group">
        <label for="berat">Berat (dalam gram)*</label>
        <input type="number" class="form-control" id="berat" name="berat" value="<?= $data['emas']['berat']; ?>" required>
      </div>
      <div class="form-group">
        <label for="nominal">Harga</label>
        <input type="number" class="form-control" id="nominal" name="nominal" value="" required>
      </div>
      <input type="text" class="d-none" name="id" value="<?= $data['emas']['id']; ?>">
      <input type="text" class="d-none" name="sumber" value="jual emas <?= $data['emas']['berat']; ?> gram">
      <input type="text" class="d-none" name="keterangan" value="">
      <button type="submit" class="btn btn-danger">Jual</button>
    </form>
  </div>
</div>