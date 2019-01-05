<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Orang Hilang</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('pendataan/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Orang Hilang</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_lengkap']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_lengkap', '', array('class' => 'form-control', 'placeholder' => $label['nama_lengkap'], 'id' => 'input-nama_lengkap'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_panggilan']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_panggilan', '', array('id'=>'input-nama_panggilan','class' => 'form-control', 'placeholder' => $label['nama_panggilan']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['alamat']?></label>
              <div class="col-sm-9">
                <textarea id="input-alamat" class="form-control" name="alamat" placeholder="<?=$label['alamat']?>"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['umur']?></label>
              <div class="col-sm-9">
                <?=form_input('umur', '', array('id'=>'input-umur','class' => 'form-control', 'placeholder' => $label['umur']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_jenis_kelamin']?></label>
              <div class="col-sm-9">
                  <select class="form-control" name="id_jenis_kelamin" id="input-id_jenis_kelamin">
                    <option value="" style="display:none;" selected><?=$label['id_jenis_kelamin']?></option>
                    <?php foreach($gender as $g){?>
                      <option value="<?= $g->id ?>"><?= $g->nama_jenis_kelamin ?></option>
                    <?php } ?>
                  </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['marga_suku']?></label>
              <div class="col-sm-9">
                <?=form_input('marga_suku', '', array('id'=>'input-marga_suku','class' => 'form-control', 'placeholder' => $label['marga_suku']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['warna_kulit']?></label>
              <div class="col-sm-9">
                <?=form_input('warna_kulit', '', array('id'=>'input-warna_kulit','class' => 'form-control', 'placeholder' => $label['warna_kulit']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['baju_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('baju_terakhir', '', array('id'=>'input-baju_terakhir','class' => 'form-control', 'placeholder' => $label['baju_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['celana_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('celana_terakhir', '', array('id'=>'input-celana_terakhir','class' => 'form-control', 'placeholder' => $label['celana_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_kategori_umur']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_kategori_umur" id="input-id_kategori_umur">
                  <option value="" style="display:none;" selected><?=$label['id_kategori_umur']?></option>
                  <?php foreach($kategoriumur as $ku){?>
                    <option value="<?= $ku->id ?>"><?= $ku->nama_kategori_umur ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto']?></label>
              <div class="col-sm-9">
                <input type="text" name="foto" class="form-control" id="input-foto" accept="image/x-png,image/jpeg" onchange="validateFileType()" value="Klik Untuk Upload" onclick="ubah_foto()">
                <br style="display: none;" id="br">
                <i onclick="cancel_foto()" class="btn btn-danger" style="display: none;" id="cancel-foto">Cancel</i>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lokasi_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('lokasi_terakhir', '', array('id'=>'input-lokasi_terakhir','class' => 'form-control', 'placeholder' => $label['lokasi_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lat_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lat_lokasi', '', array('id'=>'input-lat_lokasi','class' => 'form-control', 'placeholder' => $label['lat_lokasi']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lon_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lon_lokasi', '', array('id'=>'input-lon_lokasi','class' => 'form-control', 'placeholder' =>$label['lon_lokasi']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ayah']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ayah', '', array('id'=>'input-nama_ayah','class' => 'form-control', 'placeholder' => $label['nama_ayah']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ibu']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ibu', '', array('id'=>'input-nama_ibu','class' => 'form-control', 'placeholder' => $label['nama_ibu']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_bencana_alam']?></label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control" id="input-id_bencana_alam">
                  <option value="" style="display:none;" selected><?=$label['id_bencana_alam']?></option>
                  <?php foreach($bencanaalam as $bencana){?>
                    <option value="<?= $bencana->id ?>"><?= $bencana->nama_bencana_alam ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_status_org_hilang']?></label>
              <div class="col-sm-9">
                <select name="id_status_org_hilang" class="form-control" id="input-id_status_org_hilang">
                <option value="" style="display:none;" selected><?=$label['id_status_org_hilang']?></option>                  
                  <?php foreach($statusorg as $status){?>
                    <option value="<?= $status->id ?>"><?= $status->nama_status_org ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan_lainnya']?></label>
              <div class="col-sm-9">
                <textarea id="input-keterangan_lainnya" class="form-control" name="keterangan_lainnya" placeholder="<?=$label['keterangan_lainnya']?>"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>            
          </div>
          <div class="col-md-6">
            <h4>Data Pelapor</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_pelapor', '', array('id'=>'input-no_hp_pelapor','class' => 'form-control', 'placeholder' => $label['nama_pelapor'], 'id' => 'input-nama_pelapor'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['no_hp_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('no_hp_pelapor', '', array('id'=>'input-no_hp_pelapor','class' => 'form-control', 'placeholder' => $label['no_hp_pelapor'].' (mulai dengan 0)'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_hubungan_pelapor']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_hubungan_pelapor" id="input-id_hubungan_pelapor">
                  <option value="" style="display:none;" selected><?=$label['id_hubungan_pelapor']?></option>
                  <?php foreach($hubunganpelapor as $hp){?>
                    <option value="<?= $hp->id ?>"><?= $hp->nama_hubungan_pelapor ?></option>
                  <?php } ?>
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