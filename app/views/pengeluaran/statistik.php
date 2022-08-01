<div class="row mb-3">
  <div class="col d-flex">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/pengeluaran/statistik" id="formbulanpengeluaran">
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
      <button class="btn btn-primary form-control mr-sm-2" id="lihatpengeluaranperhari" type="button">Lihat</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col" id="statistik">
    <h4>Statistik Pengeluaran per Hari, Bulan <span id="namabulan"><?= $data['bulan']; ?></span> Tahun <span id="namatahun"><?= $data['tahun']; ?></span></h4>
    <canvas id="chartpengeluaranperhari"></canvas>
  </div>
</div>
<div class="row mt-3">
  <div class="col" id="kategori">
    <div class="row">
      <div class="col">
        <table class="table table-bordered table-hover">
          <thead class="thead-dark">
            <tr class="text-center">
              <th scope="col">Kategori</th>
              <th scope="col">Nominal</th>
              <th scope="col">Persentase</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $total = (int)$data['total']['total'];
            foreach ($data['sumkategori'] as $sumkategori) :
              $persentase = (int)$sumkategori['totalNominal'] / $total * 100;
            ?>
              <tr>
                <td><?= $sumkategori['kategori']; ?></td>
                <td>Rp. <?= number_format($sumkategori['totalNominal']); ?></td>
                <td><?= number_format($persentase, 1); ?> %</td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>