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
                <?=$this->ckeditor->editor('isi',@$default_value);?>                
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