
<h4 class="c-grey-900 mT-10 mB-30">Daftar User</h4>
<div class="container-fluid" style="background-color: white;padding: 2%;white-space: wrap;">
<center>
  <?= form_open('user/add', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
  <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
  <?=form_close()?>
</center>
<table class="table table-bordered table-striped" id="mytable" style="width:100%">
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