<div class="row">
  <div class="col">
    <h3>Beli Emas</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg p-2" method="POST" action="<?= BASEURL; ?>/emas/prosesbeli">
      <div class="form-group">
        <label for="tanggal">Tanggal*</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
      </div>
      <div class="form-group">
        <label for="berat">Berat (dalam gram)*</label>
        <input type="number" class="form-control" id="berat" name="berat" required>
      </div>
      <div class="form-group">
        <label for="nominal">Harga</label>
        <input type="number" class="form-control" id="nominal" name="nominal" required>
      </div>
      <input type="text" class="d-none" name="tujuan" value="beli emas">
      <input type="text" class="d-none" name="keterangan" value="">
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>