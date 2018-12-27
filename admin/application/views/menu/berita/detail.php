<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Detail Berita</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">            
        <div class="row">
          <div class="col-md-12">
            <h4>Data Berita</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['judul_berita']?></label>
              <div class="col-sm-9">
                <?=form_input('', $detail->judul_berita, array('class' => 'form-control', 'placeholder' => $label['judul_berita'], 'disabled'=>true));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>       
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['isi']?></label>
              <div class="col-sm-9">
                <textarea disabled="" id="isi" cols="5" rows="5"><?=$detail->isi?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['status']?></label>
              <div class="col-sm-9">
                <select class="form-control" disabled="">
                  <option value="0" <?=($detail->status=='0')?'selected':''?>>Unpublished</option>
                  <option value="1" <?=($detail->status=='1')?'selected':''?>>Published</option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>                   
        </div>        
      </div>
      <a href="<?=base_url('berita')?>">
        <button type="button" class="btn cur-p btn-primary">Kembali</button>
      </a>
    </div>
  </div>
</div>