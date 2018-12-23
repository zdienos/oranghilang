<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Orang Hilang</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('pendataan/addOrangHilang', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Orang Hilang</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Lengkap</label>
              <div class="col-sm-9">
                <?=form_input('nama_lengkap', '', array('class' => 'form-control', 'placeholder' => 'Nama Lengkap', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Panggilan</label>
              <div class="col-sm-9">
                <?=form_input('nama_panggilan', '', array('class' => 'form-control', 'placeholder' => 'Nama Panggilan', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Alamat</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Umur</label>
              <div class="col-sm-9">
                <?=form_input('umur', '', array('class' => 'form-control', 'placeholder' => 'Umur', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
              <div class="col-sm-9">
                  <select class="form-control" name="id_jenis_kelamin">
                    <?php foreach($gender as $g){?>
                      <option value="<?= $g->id ?>"><?= $g->nama_jenis_kelamin ?></option>
                    <?php } ?>
                  </select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Marga Suku</label>
              <div class="col-sm-9">
                <?=form_input('marga_suku', '', array('class' => 'form-control', 'placeholder' => 'Marga Suku', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Warna Kulit</label>
              <div class="col-sm-9">
                <?=form_input('warna_kulit', '', array('class' => 'form-control', 'placeholder' => 'Warna Kulit', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Baju Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('baju_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Baju Terakhir', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Celana Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('celana_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Celana Terakhir', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Kategori Umur</label>
              <div class="col-sm-9">
                <select class="form-control" name="id_kategori_umur">
                  <?php foreach($kategoriumur as $ku){?>
                    <option value="<?= $ku->id ?>"><?= $ku->nama_kategori_umur ?></option>
                  <?php } ?>
                </select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Foto</label>
              <div class="col-sm-9">
                <input type="text" name="foto" class="form-control">
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Lokasi Terakhir</label>
              <div class="col-sm-9">
                <?=form_input('lokasi_terakhir', '', array('class' => 'form-control', 'placeholder' => 'Lokasi Terakhir', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Latitude Lokasi</label>
              <div class="col-sm-9">
                <?=form_input('lat_lokasi', '', array('class' => 'form-control', 'placeholder' => 'Latitude Lokasi', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Longitude Lokasi</label>
              <div class="col-sm-9">
                <?=form_input('lon_lokasi', '', array('class' => 'form-control', 'placeholder' => 'Longitude Lokasi', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Ayah</label>
              <div class="col-sm-9">
                <?=form_input('nama_ayah', '', array('class' => 'form-control', 'placeholder' => 'Nama Ayah', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Ibu</label>
              <div class="col-sm-9">
                <?=form_input('nama_ibu', '', array('class' => 'form-control', 'placeholder' => 'Nama Ibu', 'id' => 'input-email'));?>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Bencana Alam</label>
              <div class="col-sm-9">
                <select name="id_bencana_alam" class="form-control">
                  <?php foreach($bencanaalam as $bencana){?>
                    <option value="<?= $bencana->id ?>"><?= $bencana->nama_bencana_alam ?></option>
                  <?php } ?>
                <select>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Keterangan Lainnya</label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan_lainnya" placeholder="Keterangan Lainnya"></textarea>
                <div id="error"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Tanggal Laporan</label>
              <div class="col-sm-9">
                <input type="date" name="tgl_laporan" class="form-control ">
                <div id="error"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Pelapor</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Nama Pelapor</label>
              <div class="col-sm-9">
                <?=form_input('nama_pelapor', '', array('class' => 'form-control', 'placeholder' => 'Nama Pelapor', 'id' => 'input-email'));?>
              </div>
              <div id="error"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">No. HP Pelapor</label>
              <div class="col-sm-9">
                <?=form_input('no_hp_pelapor', '', array('class' => 'form-control', 'placeholder' => 'Nama Pelapor', 'id' => 'input-email'));?>
              </div>
              <div id="error"></div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Hubungan Pelapor</label>
              <div class="col-sm-9">
                <select class="form-control" name="id_hubungan_pelapor">
                  <?php foreach($hubunganpelapor as $hp){?>
                    <option value="<?= $hp->id ?>"><?= $hp->nama_hubungan_pelapor ?></option>
                  <?php } ?>
                </select>
              </div>
              <div id="error"></div>
            </div>
          </div>
        </div>
      <a a href="javascript:;" onclick="document.getElementById('form-add').submit();" class="btn cur-p btn-primary">Tambah Data</a>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>