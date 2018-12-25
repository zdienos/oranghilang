<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30"><?= $captoranghilang ?></h4>
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
              <th>Nama Bencana</th>
              <th>Lokasi Terakhir</th>
              <th>Nama Lengkap / Panggilan</th>
              <th>Jenis Kelamin / Umur</th>
              <th>Alamat</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tfoot>
          <?php foreach($oranghilang as $data){ ?>
            <tr>
              <td>1</td>
              <td><?= $data->nama_bencana_alam ?></td>
              <td><?= $data->lokasi_terakhir ?></td>
              <td><?= $data->nama_lengkap ?> / <?= $data->nama_panggilan ?></td>
              <td><?= $jenkel["$data->nama_jenis_kelamin"] ?> / <?= $data->umur ?> Tahun</td>
              <td><?= $data->alamat ?></td>
              <td><?= $data->nama_status_org ?></td>
              <td>
                <button class="btn cur-p btn-success">
                  <span class="ti-eye"></span>
                </button>
                <button class="btn cur-p btn-primary">
                  <span class="ti-pencil"></span>
                </button>
                <button class="btn cur-p btn-danger">
                  <span class="ti-trash"></span>
                </button>
              </td>
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