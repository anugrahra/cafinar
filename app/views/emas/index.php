<div class="row">
  <div class="col">
    <h3>INVESTASI EMAS</h3>
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
          <th scope="col">Berat</th>
          <th scope="col">Tanggal Beli</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data['emas'] as $emas) :
        ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= number_format($emas['berat']); ?> gr</td>
            <td><?= date('d F Y', strtotime($emas['tgl_beli'])); ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>