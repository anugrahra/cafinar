<div class="row">
  <div class="col">
    <h3>Tambah piutang</h3>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col-6">
    <form class="shadow rounded-lg p-2" method="POST" action="<?= BASEURL; ?>/piutang/prosestambah">
      <div class="form-group">
        <label for="tanggal">Tanggal*</label>
        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
      </div>
      <div class="form-group">
        <label for="nominal">Nominal*</label>
        <input type="number" class="form-control" id="nominal" name="nominal" required>
      </div>
      <div class="form-group">
        <label for="sumber">Debitur*</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" required>
        <!-- if debitur = 1 then tujuan = debitur -->
      </div>
      <div class="form-group">
        <input type="text" class="d-none" id="kategori" name="kategori" value="Piutang" required>
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>