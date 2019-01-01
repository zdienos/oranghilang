<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Data Berita</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
          <?= form_open('berita/add', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
            <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
          <?=form_close()?>
        </center>
        <table class="table table-bordered table-striped" id="mytable">
          <thead>
            <tr>   
              <th>No</th>
              <th>Judul Berita</th>            
              <th>Editor</th>
              <th>Tanggal</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>