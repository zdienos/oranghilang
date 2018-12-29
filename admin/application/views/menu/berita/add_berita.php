<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Berita</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('berita/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-12">
            <h4>Data Berita</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['judul_berita']?></label>
              <div class="col-sm-9">
                <?=form_input('judul_berita', '', array('class' => 'form-control', 'placeholder' => $label['judul_berita'], 'id' => 'input-judul_berita'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>       
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['isi']?></label>
              <div class="col-sm-9">
                <textarea name="isi" id="isi" cols="5" rows="5"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto_header']?></label>
              <div class="col-sm-9">
                <?=form_input('foto_header', '', array('class' => 'form-control', 'placeholder' => $label['foto_header'], 'id' => 'input-foto_header'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto_thumbnail']?></label>
              <div class="col-sm-9">
                <?=form_input('foto_thumbnail', '', array('class' => 'form-control', 'placeholder' => $label['foto_thumbnail'], 'id' => 'input-foto_thumbnail'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['tag']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="tag" placeholder="<?=$label['tag']?>" id="input-tag"></textarea>                
                <div id="error" class="invalid-feedback"></div>
                <small>Pisahkan dengan tanda koma (,)</small>
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