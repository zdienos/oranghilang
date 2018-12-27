<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Edit Berita</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('berita/update/'.$detail->id_berita, array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-12">
            <h4>Data Berita</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_user']?></label>
              <div class="col-sm-9">
                <input type="hidden" name="id_user" value="<?=$detail->id?>">
                <input type="hidden" name="id_berita" value="<?=$detail->id_berita?>">
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['judul_berita']?></label>
              <div class="col-sm-9">
                <?=form_input('judul_berita', $detail->judul_berita, array('class' => 'form-control', 'placeholder' => $label['judul_berita'], 'id' => 'input-judul_berita'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>       
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['isi']?></label>
              <div class="col-sm-9">
                <textarea name="isi" id="isi" cols="5" rows="5"><?=$detail->isi?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['status']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="status">
                  <option value="0" <?=($detail->status=='0')?'selected':''?>>Unpublished</option>
                  <option value="1" <?=($detail->status=='1')?'selected':''?>>Published</option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>         
        </div>        
        <button type="submit" id="button-submit" class="btn cur-p btn-primary">Edit Data</button>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>