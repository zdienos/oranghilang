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
        <table class="table table-stripped" id="user" class="display" style="width:100%">
        <thead>
          <tr>   
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>User Grup</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tfoot>
          <?php $i=0; foreach($user as $data){ $i++;?>
            <tr>
              <td><?=$i?></td>              
              <td><?=$data->name?></td>
              <td><?=$data->email?></td>
              <td><?=$data->nama_grup?></td>
              <td>
                <?= form_open('user/edit/'.$data->id);?>
                  <button type="submit" class="btn cur-p btn-primary">
                    <span class="ti-pencil"></span>
                  </button>
                <?=form_close()?>
                
                <?= form_open('user/delete/'.$data->id);?>
                  <button type="submit" class="btn cur-p btn-danger" onclick="return confirm('Are you sure to delete this item ?')">
                    <span class="ti-trash"></span>
                  </button>
                <?=form_close()?>
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
  $(document).ready(function() {
    $('#user').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "localhost/stiki/admin/user/dataTableServerRender"
    } );
} );
</script>