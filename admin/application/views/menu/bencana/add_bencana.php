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
                <select class="form-control" id="input-jenis_bencana_alam" name="jenis_bencana_alam">
                <option value="" style="display:none;" selected>Pilih Jenis Bencana</option>
                <?php foreach($jenis_bencana as $bencana){ ?>
                  <option value="<?= $bencana->id ?>"><?= $bencana->nama_jenis_bencana_alam ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_bencana']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_bencana_alam', '', array('class' => 'form-control', 'placeholder' => $label['nama_bencana'], 'id' => 'input-nama_bencana_alam'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label is-invalid"><?=$label['tgl_waktu']?></label>
              <div class="col-sm-9">
                <input type="date" name="tgl_waktu" class="form-control" id="input-tgl_waktu">
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan" placeholder="<?=$label['keterangan']?>" id="input-keterangan"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Daerah Bencana</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['provinces']?></label>
              <div class="col-sm-9">
                <select name="id_provinces" class="form-control"  id="input-id_provinces">
                  <option value="" style="display:none;" selected>Pilih Provinsi</option>
                <?php foreach($provinces as $provincess){ ?>
                  <option value="<?= $provincess->id ?>"><?= $provincess->name_provinces ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['regencies']?></label>
              <div class="col-sm-9">
                <select name="id_regencies" class="form-control" id="input-id_regencies">
                  <option value="" style="display:none;" selected>Pilih Kota/Kabupaten</option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['districts']?></label>
              <div class="col-sm-9">
                <select name="id_districts" class="form-control" id="input-id_districts">
                  <option value="" style="display:none;" selected>Pilih Kecamatan</option>
                
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['villages']?></label>
              <div class="col-sm-9">
                <select name="id_villages" class="form-control" id="input-id_villages">
                  <option value="" style="display:none;" selected>Pilih Desa</option>
                
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </div>
        <a href="<?=base_url($this->uri->segment(1))?>" class="btn btn-danger">Batal</a>
        <button type="submit" id="button-submit" class="btn cur-p btn-primary">Simpan</button>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>