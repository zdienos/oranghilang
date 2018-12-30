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
                <?=form_input('nama_lengkap', $detail->nama_lengkap, array('class' => 'form-control', 'placeholder' => $label['nama_lengkap'], 'id' => 'input-nama_lengkap', 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_panggilan']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_panggilan', $detail->nama_panggilan, array('id'=>'input-nama_panggilan','class' => 'form-control', 'placeholder' => $label['nama_panggilan'], 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['alamat']?></label>
              <div class="col-sm-9">
                <textarea id="input-alamat" class="form-control" name="alamat" placeholder="<?=$label['alamat']?>" readonly="readonly"><?= $detail->alamat ?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['umur']?></label>
              <div class="col-sm-9">
                <?=form_input('umur', $detail->umur, array('id'=>'input-umur','class' => 'form-control', 'placeholder' => $label['umur'], 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_jenis_kelamin']?></label>
              <div class="col-sm-9">
                  <select class="form-control" name="id_jenis_kelamin" id="input-id_jenis_kelamin" disabled>
                    <option><?= $detail->nama_jenis_kelamin ?></option>
                  </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['marga_suku']?></label>
              <div class="col-sm-9">
                <?=form_input('marga_suku', $detail->marga_suku, array('id'=>'input-marga_suku','class' => 'form-control', 'placeholder' => $label['marga_suku'], 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['warna_kulit']?></label>
              <div class="col-sm-9">
                <?=form_input('warna_kulit', $detail->warna_kulit, array('id'=>'input-warna_kulit','class' => 'form-control', 'placeholder' => $label['warna_kulit'], 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['baju_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('baju_terakhir', $detail->baju_terakhir, array('id'=>'input-baju_terakhir','class' => 'form-control', 'placeholder' => $label['baju_terakhir'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['celana_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('celana_terakhir', $detail->celana_terakhir, array('id'=>'input-celana_terakhir','class' => 'form-control', 'placeholder' => $label['celana_terakhir'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_kategori_umur']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_kategori_umur" id="input-id_kategori_umur" disabled>
                  <option><?= $detail->nama_kategori_umur ?></option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto']?></label>
              <div class="col-sm-9">
                <img src="<?=base_url('assets/orang_hilang/foto/'.$detail->foto)?>" style="width: 200px;height: auto;">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lokasi_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('lokasi_terakhir', $detail->lokasi_terakhir, array('id'=>'input-lokasi_terakhir','class' => 'form-control', 'placeholder' => $label['lokasi_terakhir'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lat_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lat_lokasi', $detail->lat_lokasi, array('id'=>'input-lat_lokasi','class' => 'form-control', 'placeholder' => $label['lat_lokasi'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lon_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lon_lokasi', $detail->lon_lokasi, array('id'=>'input-lon_lokasi','class' => 'form-control', 'placeholder' =>$label['lon_lokasi'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ayah']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ayah', $detail->nama_ayah, array('id'=>'input-nama_ayah','class' => 'form-control', 'placeholder' => $label['nama_ayah'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ibu']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ibu', $detail->nama_ibu, array('id'=>'input-nama_ibu','class' => 'form-control', 'placeholder' => $label['nama_ibu'], 'readonly' => true));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_bencana_alam']?></label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control" id="input-id_bencana_alam" disabled>
                  <option><?= $detail->nama_bencana_alam ?></option>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_status_org_hilang']?></label>
              <div class="col-sm-9">
                <select name="id_status_org_hilang" class="form-control" id="input-id_status_org_hilang" disabled>
                <option><?= $detail->nama_status_org ?></option>                  
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan_lainnya']?></label>
              <div class="col-sm-9">
                <textarea id="input-keterangan_lainnya" class="form-control" name="keterangan_lainnya" placeholder="<?= $detail->keterangan_lainnya ?>" readonly="readonly"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>            
          </div>
          <div class="col-md-6">
            <h4>Data Pelapor</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_pelapor', $detail->nama_pelapor, array('class' => 'form-control', 'placeholder' => $label['id_bencana_alam'], 'id' => 'input-nama_pelapor', 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['no_hp_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('no_hp_pelapor', $detail->no_hp_pelapor, array('id'=>'input-no_hp_pelapor','class' => 'form-control', 'placeholder' => $label['no_hp_pelapor'], 'readonly' => true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_hubungan_pelapor']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_hubungan_pelapor" id="input-id_hubungan_pelapor" disabled>
                  <option><?= $detail->nama_hubungan_pelapor ?>r</option>
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