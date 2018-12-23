<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Bencana</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">
        <center>
        </center>
        <?= form_open('bencana/addBencana', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <table>
          <tr>
            <td>Jenis Bencana Alam</td>
            <td>
              <select name="id_jenis_bencana_alam" class="form-control">
              <?php foreach($jenis_bencana as $bencana){ ?>
                <option value="<?= $bencana->id ?>"><?= $bencana->nama_jenis_bencana_alam ?></option>    
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Provinces</td>
            <td>
              <select name="id_provinces" class="form-control">
              <?php foreach($provinces as $provincess){ ?>
                <option value="<?= $provincess->id ?>"><?= $provincess->name_provinces ?></option>    
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Regenci</td>
            <td> 
              <select name="id_regencies" class="form-control">
              <?php foreach($regencies as $regenciess){ ?>
                <option value="<?= $regenciess->id ?>"><?= $regenciess->name_regencies ?></option>    
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>District</td>
            <td> 
              <select name="id_districts" class="form-control">
              <?php foreach($districts as $districtss){ ?>
                <option value="<?= $districtss->id ?>"><?= $districtss->name_disctricts ?></option>    
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Villages</td>
            <td> 
              <select name="id_villages" class="form-control">
              <?php foreach($villages as $villagess){ ?>
                <option value="<?= $villagess->id ?>"><?= $villagess->name_villages ?></option>    
              <?php } ?>
              </select>
            </td>
          </tr>
          <tr>
            <td>Nama Bencana</td>
            <td><input type="text" class="form-control" name="nama_bencana_alam"></td>
          </tr>
          <tr>
            <td>Tanggal</td>
            <td><input type="date" class="form-control" name="tgl_waktu"></td>
          </tr>
          <tr>
            <td>Keterangan</td>
            <td><input type="text" class="form-control" name="keterangan"></td>
          </tr>
        </table>
        <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
          <?=form_close()?>
      </div>
    </div>
  </div>
</div>
<script>

</script>