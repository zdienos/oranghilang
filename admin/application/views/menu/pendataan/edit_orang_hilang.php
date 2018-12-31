<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Edit Data Orang Hilang</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('pendataan/update/'.$edit->id, array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Orang Hilang</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_lengkap']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_lengkap', $edit->nama_lengkap, array('class' => 'form-control', 'placeholder' => $label['nama_lengkap'], 'id' => 'input-nama_lengkap'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_panggilan']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_panggilan', $edit->nama_panggilan, array('id'=>'input-nama_panggilan','class' => 'form-control', 'placeholder' => $label['nama_panggilan']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['alamat']?></label>
              <div class="col-sm-9">
                <textarea id="input-alamat" class="form-control" name="alamat" placeholder="<?=$label['alamat']?>"><?= $edit->alamat ?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['umur']?></label>
              <div class="col-sm-9">
                <?=form_input('umur', $edit->umur, array('id'=>'input-umur','class' => 'form-control', 'placeholder' => $label['umur']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_jenis_kelamin']?></label>
              <div class="col-sm-9">
                  <select class="form-control" name="id_jenis_kelamin" id="input-id_jenis_kelamin">
                    <option value="<?= $selectedjenkel->id ?>" selected><?= $selectedjenkel->nama_jenis_kelamin ?></option>
                    <?php foreach($notselectedjenkel as $nsj){?>
                      <option value="<?= $nsj->id ?>"><?= $nsj->nama_jenis_kelamin ?></option>
                    <?php } ?>
                  </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['marga_suku']?></label>
              <div class="col-sm-9">
                <?=form_input('marga_suku', $edit->marga_suku, array('id'=>'input-marga_suku','class' => 'form-control', 'placeholder' => $label['marga_suku']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['warna_kulit']?></label>
              <div class="col-sm-9">
                <?=form_input('warna_kulit', $edit->warna_kulit, array('id'=>'input-warna_kulit','class' => 'form-control', 'placeholder' => $label['warna_kulit']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['baju_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('baju_terakhir', $edit->baju_terakhir, array('id'=>'input-baju_terakhir','class' => 'form-control', 'placeholder' => $label['baju_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['celana_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('celana_terakhir', $edit->celana_terakhir, array('id'=>'input-celana_terakhir','class' => 'form-control', 'placeholder' => $label['celana_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_kategori_umur']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_kategori_umur" id="input-id_kategori_umur">
                  <option value="<?= $selectedkategoriumur->id ?>" selected><?= $selectedkategoriumur->nama_kategori_umur ?></option>
                  <?php foreach($notselectedkategoriumur as $nsku){?>
                    <option value="<?= $nsku->id ?>"><?= $nsku->nama_kategori_umur ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto']?></label>
              <div class="col-sm-9">
                <input type="text" name="foto" class="form-control" id="input-foto" accept="image/x-png,image/jpeg" onchange="validateFileType()" hidden="true" value="<?=$edit->foto?>">
                <img id="foto" src="<?=base_url('assets/orang_hilang/foto/'.$edit->foto )?>" width="auto" height="200px">
                <i onclick="ubah()"  class="btn btn-success" id="ubah_foto">Ubah</i>
                <i onclick="hapus()"  class="btn btn-danger" id="hapus_foto">Hapus</i>
                <i onclick="ubah()" style="width: 100%;display: none;" class="btn btn-primary" id="tambah_foto">Tambah Foto</i>
                <br><i style="display:none;margin-top: 50px;" onclick="cancel()"  class="btn btn-danger" id="cancel_foto">Cancel</i>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lokasi_terakhir']?></label>
              <div class="col-sm-9">
                <?=form_input('lokasi_terakhir', $edit->lokasi_terakhir, array('id'=>'input-lokasi_terakhir','class' => 'form-control', 'placeholder' => $label['lokasi_terakhir']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lat_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lat_lokasi', $edit->lat_lokasi, array('id'=>'input-lat_lokasi','class' => 'form-control', 'placeholder' => $label['lat_lokasi']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['lon_lokasi']?></label>
              <div class="col-sm-9">
                <?=form_input('lon_lokasi', $edit->lon_lokasi, array('id'=>'input-lon_lokasi','class' => 'form-control', 'placeholder' =>$label['lon_lokasi']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ayah']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ayah', $edit->nama_ayah, array('id'=>'input-nama_ayah','class' => 'form-control', 'placeholder' => $label['nama_ayah']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_ibu']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_ibu', $edit->nama_ibu, array('id'=>'input-nama_ibu','class' => 'form-control', 'placeholder' => $label['nama_ibu']));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_bencana_alam']?></label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control" id="input-id_bencana_alam">
                  <option value="<?= $selectedbencanaalam->id ?>" style="display:none;" selected><?= $selectedbencanaalam->nama_bencana_alam ?></option>
                  <?php foreach($notselectedbencanaalam as $nsba){?>
                    <option value="<?= $nsba->id ?>"><?= $nsba->nama_bencana_alam ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_status_org_hilang']?></label>
              <div class="col-sm-9">
                <select name="id_status_org_hilang" class="form-control" id="input-id_status_org_hilang">
                <option value="<?= $selectedstatus->id ?>" selected><?= $selectedstatus->nama_status_org ?></option>                  
                  <?php foreach($notselectedstatus as $nss){?>
                    <option value="<?= $nss->id ?>"><?= $nss->nama_status_org ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan_lainnya']?></label>
              <div class="col-sm-9">
                <textarea id="input-keterangan_lainnya" class="form-control" name="keterangan_lainnya" placeholder="<?=$label['keterangan_lainnya']?>"><?= $edit->keterangan_lainnya ?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>            
          </div>
          <div class="col-md-6">
            <h4>Data Pelapor</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_pelapor', $edit->nama_pelapor, array('id'=>'input-nama_pelapor','class' => 'form-control', 'placeholder' => $label['nama_pelapor']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['no_hp_pelapor']?></label>
              <div class="col-sm-9">
                <?=form_input('no_hp_pelapor', $edit->no_hp_pelapor, array('id'=>'input-no_hp_pelapor','class' => 'form-control', 'placeholder' => $label['no_hp_pelapor']));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_hubungan_pelapor']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_hubungan_pelapor" id="input-id_hubungan_pelapor">
                  <option value="<?= $selectedhubunganpelapor->id ?>" selected><?= $selectedhubunganpelapor->nama_hubungan_pelapor ?></option>
                  <?php foreach($notselectedhubunganpelapor as $nshp){?>
                    <option value="<?= $nshp->id ?>"><?= $nshp->nama_hubungan_pelapor ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </div>
        <a href="<?=base_url($this->uri->segment(1).'/'.$this->session->userdata('redirect'))?>" class="btn btn-danger">Batal</a>
        <button type="submit" id="button-submit" class="btn cur-p btn-primary">Simpan</button>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>