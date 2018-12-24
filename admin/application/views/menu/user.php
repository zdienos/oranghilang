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
          </tr>
        </thead>
        <tfoot>
          <?php foreach($user as $data){ ?>
            <tr>
              <td>1</td>
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