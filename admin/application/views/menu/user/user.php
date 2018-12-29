<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Basic Tables</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
          <?= form_open('user/add', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
            <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
          <?=form_close()?>
        </center>
        <table class="table table-bordered table-stripped" id="mytable" class="display" style="width:100%">
        <thead>
          <tr>   
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Tanggal</th>
            <th>User Grup</th>
            <th>Aksi</th>
          </tr>
        </thead>
        </table>
      </div>
    </div>
  </div>
</div>