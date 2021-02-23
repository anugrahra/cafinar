<div class="row mb-3">
  <div class="col d-flex">
    <form class="form-inline" method="POST" action="<?= BASEURL; ?>/pemasukan/statistik" id="formbulanpemasukan">
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
      <button class="btn btn-primary form-control mr-sm-2" id="lihatpemasukanperhari" type="button">Lihat</button>
    </form>
  </div>
</div>

<div class="row">
  <div class="col" id="statistik">
    <h4>Statistik Pemasukan per Hari, Bulan <span id="namabulan"><?= $data['bulan']; ?></span> Tahun <span id="namatahun"><?= $data['tahun']; ?></span></h4>
    <canvas id="chartpemasukanperhari"></canvas>
  </div>
</div>