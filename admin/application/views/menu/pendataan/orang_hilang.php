<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Daftar Orang Hilang</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
          <a a href="<?= base_url('pendataan/add')?>"  class="btn cur-p btn-primary">Tambah Data</a>
        </center>
        <br>
        <table class="table table-stripped" id="bencana" class="display" style="width:100%">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Bencana</th>
            <th>Jenis Bencana Alam</th>
            <th>Regenci</th>
            <th>District</th>
            <th>Village</th>
            <th>Nama Bencana</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
          </tr>
        </thead>
        <tfoot>
          <?php foreach($oranghilang as $data){ ?>
            <tr>
              <td>1</td>
              <td><?= $data->id ?></td>
              <td><?= $data->nama_lengkap ?></td>
              <td><?= $data->nama_panggilan ?></td>
              <td><?= $data->alamat ?></td>
              <td><?= $data->umur ?></td>
              <td><?= $data->id_jenis_kelamin ?></td>
              <td><?= $data->marga_suku ?></td>
              <td><?= $data->warna_kulit ?></td>
            </tr>
          <?php } ?>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>
<script>

</script>