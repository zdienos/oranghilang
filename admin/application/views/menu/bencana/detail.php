<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Bencana Alam</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('bencana/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Bencana Alam</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['jenis_bencana']?></label>
              <div class="col-sm-9">
                <select class="form-control" id="input-jenis_bencana_alam" name="jenis_bencana_alam" disabled>
                  <option value="<?= $detail->jbaaid ?>"><?= $detail->nama_jenis_bencana_alam ?></option>
                  <?php foreach($notselectedjenisbencana as $nsjb){ ?>
                    <option value="<?= $nsjb->id ?>"><?= $nsjb->nama_jenis_bencana_alam ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_bencana']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_bencana_alam', $detail->nama_bencana_alam, array('class' => 'form-control', 'placeholder' => $label['nama_bencana'], 'id' => 'input-nama_bencana_alam', 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label is-invalid"><?=$label['tgl_waktu']?></label>
              <div class="col-sm-9">
                <input type="text" readonly value="<?= $detail->tgl_waktu ?>" class="form-control">
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan" placeholder="<?=$label['keterangan']?>" id="input-keterangan" readonly><?= $detail->keterangan ?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Daerah Bencana</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['provinces']?></label>
              <div class="col-sm-9">
                <select name="id_provinces" class="form-control"  id="input-id_provinces" disabled>
                  <option><?= $detail->name_provinces ?></option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['regencies']?></label>
              <div class="col-sm-9">
                <select name="id_regencies" class="form-control" id="input-id_regencies" disabled>
                  <option><?= $detail->name_regencies ?></option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['districts']?></label>
              <div class="col-sm-9">
                <select name="id_districts" class="form-control" id="input-id_districts" disabled>
                  <option><?= $detail->name_disctricts ?></option>
                
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['villages']?></label>
              <div class="col-sm-9">
                <select name="id_villages" class="form-control" id="input-id_villages" disabled>
                  <option><?= $detail->name_villages ?></option>
                
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </div>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>