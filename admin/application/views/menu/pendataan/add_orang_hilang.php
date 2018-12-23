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
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <?=form_input('nama_lengkap', '', array('class' => 'form-control', 'placeholder' => 'Nama Lengkap'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Panggilan</label>
              <div class="col-sm-9">
                <?=form_input('nama_panggilan', '', array('class' => 'form-control', 'placeholder' => 'Nama Panggilan'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Umur</label>
              <div class="col-sm-9">
                <?=form_input('umur', '', array('class' => 'form-control', 'placeholder' => 'Umur'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                  <select class="form-control" name="id_jenis_kelamin" id="input-id_jenis_kelamin">
                    <option value="" style="display:none;" selected>Pilih Jenis Kelamin</option>
                    <?php foreach($gender as $g){?>
                      <option value="<?= $g->id ?>"><?= $g->nama_jenis_kelamin ?></option>
                    <?php } ?>
                  </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Marga Suku</label>
              <div class="col-sm-9">
                <?=form_input('marga_suku', '', array('class' => 'form-control', 'placeholder' => 'Marga Suku'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Warna Kulit</label>
              <div class="col-sm-9">
                <?=form_input('warna_kulit', '', array('class' => 'form-control', 'placeholder' => 'Warna Kulit'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Baju Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('baju_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Baju Terakhir'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Celana Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('celana_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Celana Terakhir'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kategori Umur</label>
              <div class="col-sm-9">
                <select class="form-control" name="id_kategori_umur" id="input-id_kategori_umur">
                  <option value="" style="display:none;" selected>Pilih Kategori Umur</option>
                  <?php foreach($kategoriumur as $ku){?>
                    <option value="<?= $ku->id ?>"><?= $ku->nama_kategori_umur ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <input type="text" name="foto" class="form-control">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Lokasi Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('lokasi_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Lokasi Terakhir'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Latitude Lokasi</label>
              <div class="col-sm-9">
                <?=form_input('lat_lokasi', '', array('class' => 'form-control', 'placeholder' => 'Latitude Lokasi'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Longitude Lokasi</label>
              <div class="col-sm-9">
                <?=form_input('lon_lokasi', '', array('class' => 'form-control', 'placeholder' => 'Longitude Lokasi'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Ayah</label>
              <div class="col-sm-9">
                <?=form_input('nama_ayah', '', array('class' => 'form-control', 'placeholder' => 'Nama Ayah'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Ibu</label>
              <div class="col-sm-9">
                <?=form_input('nama_ibu', '', array('class' => 'form-control', 'placeholder' => 'Nama Ibu'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bencana Alam</label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control" id="input-id_bencana_alam">
                  <option value="" style="display:none;" selected>Pilih Bencana Alam</option>
                  <?php foreach($bencanaalam as $bencana){?>
                    <option value="<?= $bencana->id ?>"><?= $bencana->nama_bencana_alam ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Status</label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control" id="input-id_bencana_alam">
                  <option value="" style="display:none;" selected>Pilih Status</option>
                  <?php foreach($statusorg as $status){?>
                    <option value="<?= $status->id ?>"><?= $status->nama_status_org ?></option>
                  <?php } ?>
                <select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Keterangan Lainnya</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan_lainnya" placeholder="Keterangan Lainnya"></textarea>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal Laporan</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_laporan" class="form-control " id="input-tgl_laporan">
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Pelapor</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Pelapor</label>
              <div class="col-sm-9">
                <?=form_input('nama_pelapor', '', array('class' => 'form-control', 'placeholder' => 'Nama Pelapor', 'id' => 'input-nama_pelapor'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No. HP Pelapor</label>
              <div class="col-sm-9">
                <?=form_input('no_hp_pelapor', '', array('class' => 'form-control', 'placeholder' => 'No. HP Pelapor'));?>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Hubungan Pelapor</label>
              <div class="col-sm-9">
                <select class="form-control" name="id_hubungan_pelapor" id="input-id_hubungan_pelapor">
                  <option value="" style="display:none;" selected>Pilih Hubungan Pelapor</option>
                  <?php foreach($hubunganpelapor as $hp){?>
                    <option value="<?= $hp->id ?>"><?= $hp->nama_hubungan_pelapor ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
        </div>
        <button type="submit" id="button-submit" class="btn cur-p btn-primary">Tambah Data</button>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>