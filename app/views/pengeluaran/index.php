<div class="row">
  <div class="col">
    <h3>PENGELUARAN</h3>
  </div>
  <div class="col text-right">
    <h3 class="text-success">Saldo: Rp <?= number_format($data['saldo']['saldo']); ?></h3>
  </div>
</div>

<div class="row">
  <div class="col">
    <h4><?= $data['bulan'] ?> <?= $data['tahun'] ?></h4>
    <table>
      <tr>
        <td>
          <h4>Total</h4>
        </td>
        <td>
          <h4>&nbsp;:&nbsp;</h4>
        </td>
        <td>
          <h4><span class="text-danger">Rp. <?= number_format($data['total']['total']); ?></span></h4>
        </td>
      </tr>
      <tr class="<?= $data['hidepengeluaran']; ?>">
        <td>
          <h4>Rata-rata sampai hari ke-<?= date('d'); ?></h4>
        </td>
        <td>
          <h4>&nbsp;:&nbsp;</h4>
        </td>
        <td>
          <h4><span class="text-secondary">Rp. <?= number_format($data['ratapengeluaran']); ?></span></h4>
        </td>
      </tr>
      <tr>
        <td>
          <h4>Rata-rata per hari</h4>
        </td>
        <td>
          <h4>&nbsp;:&nbsp;</h4>
        </td>
        <td>
          <h4><span class="text-secondary">Rp. <?= number_format($data['ratapengeluaranbulanini']); ?></span></h4>
        </td>
      </tr>
    </table>
  </div>
  <div class="col d-flex justify-content-end">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/pengeluaran" id="formbulanpengeluaran">
      <label class="my-1 mr-2 sr-only" for="bulan">Bulan</label>
      <select class="custom-select my-1 mr-sm-2" id="bulan" name="bulan" required>
        <option value="00">-- Pilih Bulan --</option>
        <option value="01|Januari">Januari</option>
        <option value="02|Februari">Februari</option>
        <option value="03|Maret">Maret</option>
        <option value="04|April">April</option>
        <option value="05|Mei">Mei</option>
        <option value="06|Juni">Juni</option>
        <option value="07|Juli">Juli</option>
        <option value="08|Agustus">Agustus</option>
        <option value="09|September">September</option>
        <option value="10|Oktober">Oktober</option>
        <option value="11|November">November</option>
        <option value="12|Desember">Desember</option>
      </select>
      <label class="my-1 mr-2 sr-only" for="tahun">Tahun</label>
      <input type="number" class="custom-select my-1 mr-sm-2" id="tahun" name="tahun" placeholder="tahun" value="<?= $data['tahun']; ?>" required>
      <button class="btn btn-primary form-control mr-sm-2" type="submit">Lihat</button>
    </form>
  </div>
</div>

<div class="row mt-2">
  <div class="col-lg-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<div class="row">
  <div class="col">
    <table class="table table-bordered table-hover">
      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">No</th>
          <th scope="col">Nominal</th>
          <th scope="col">Tujuan</th>
          <th scope="col">Kategori</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Ket.</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['pengeluaran'] as $pengeluaran) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= number_format($pengeluaran['nominal']); ?></td>
            <td><?= $pengeluaran['tujuan']; ?></td>
            <td><?= $pengeluaran['kategori']; ?></td>
            <td><?= date('d F Y', strtotime($pengeluaran['tanggal'])); ?></td>
            <td><?= $pengeluaran['keterangan']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>