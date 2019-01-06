  <h4 class="c-grey-900 mT-10 mB-30"><?= $captoranghilang ?></h4>
  <div class="container-fluid" style="background-color: white;padding: 2%">
  <?php $this->session->set_userdata('redirect',$this->uri->segment(2)); ?>
        <center>
          <a a href="<?= base_url('pendataan/add')?>"  class="btn cur-p btn-primary">Tambah Data</a>
        </center>
        <table class="table table-bordered table-striped table-responsive" id="mytable">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama Bencana</th>
              <th>Tanggal</th>
              <th>Nama Lengkap / Panggilan</th>
              <th>Jenis Kelamin / Umur</th>
              <th>Alamat</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>
      </div>    