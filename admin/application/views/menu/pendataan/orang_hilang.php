<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30"><?= $captoranghilang ?></h4>
  <?php $this->session->set_userdata('redirect',$this->uri->segment(2)); ?>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
          <a a href="<?= base_url('pendataan/add')?>"  class="btn cur-p btn-primary">Tambah Data</a>
        </center>
        <table class="table table-bordered table-striped" id="mytable">
          <thead>
            <tr>
              <th>No</th>
              <th>ID</th>
              <th>Nama Bencana</th>
              <th>Tanggal</th>
              <th>Nama Lengkap / Panggilan</th>
              <th>Jenis Kelamin / Umur</th>
              <th>Alamat</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>