<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Bencana Alam</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('bencana/addBencana', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Bencana Alam</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['jenis_bencana']?></label>
              <div class="col-sm-9">
                <select name="id_jenis_bencana_alam" class="form-control">
                <?php foreach($jenis_bencana as $bencana){ ?>
                  <option value="<?= $bencana->id ?>"><?= $bencana->nama_jenis_bencana_alam ?></option>    
                <?php } ?>
                </select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_bencana']?></label>
              <div class="col-sm-9">
                <?=form_input('text', '', array('class' => 'form-control', 'placeholder' => $label['nama_bencana'], 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['tgl_bencana']?></label>
              <div class="col-sm-9">
                <input type="date" name="tgl_bencana" class="form-control">
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan" placeholder="<?=$label['keterangan']?>"></textarea>
                <div id="error"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Daerah Bencana</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['provinces']?></label>
              <div class="col-sm-9">
                <select name="id_provinces" class="form-control">
                <?php foreach($provinces as $provincess){ ?>
                  <option value="<?= $provincess->id ?>"><?= $provincess->name_provinces ?></option>    
                <?php } ?>
                </select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['regencies']?></label>
              <div class="col-sm-9">
                <select name="id_regencies" class="form-control">
                <?php foreach($regencies as $regenciess){ ?>
                  <option value="<?= $regenciess->id ?>"><?= $regenciess->name_regencies ?></option>    
                <?php } ?>
                </select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['villages']?></label>
              <div class="col-sm-9">
                <select name="id_villages" class="form-control">
                <?php foreach($villages as $villagess){ ?>
                  <option value="<?= $villagess->id ?>"><?= $villagess->name_villages ?></option>    
                <?php } ?>
                </select>
                <div id="error"></div>
              </div>
            </div>
          </div>
        </div>
      <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>