<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Basic Tables</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
          <?= form_open('berita/add', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
            <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
          <?=form_close()?>
        </center>
        <table class="table table-stripped" id="user" class="display" style="width:100%">
        <thead>
          <tr>   
            <th>No</th>
            <th>Judul Berita</th>
            <th>Isi</th>
            <th>Editor</th>
            <th>Tanggal</th>
            <th>Status</th>
          </tr>
        </thead>
        <tfoot>
          <?php $i=0; foreach($berita as $data){ $i++;?>
            <tr>
              <td><?=$i?></td>              
              <td><?=$data->judul_berita?></td>
              <td><?=$data->isi?></td>
              <td><?=$data->name?></td>
              <td><?=$data->date?></td>
              <td><?= $status["$data->status"] ?></td>
              <td></td>
              <td>
                <button class="btn cur-p btn-success"><span class="ti-eye"></span></button>
                <button class="btn cur-p btn-primary"><span class="ti-pencil"></span></button>
                <button class="btn cur-p btn-danger"><span class="ti-trash"></span></button>
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