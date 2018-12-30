<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Edit Berita</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('berita/update/'.$detail->id_berita, array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/form-data'));?>
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
                <textarea name="isi" id="input-isi" cols="5" rows="5"><?=$detail->isi?></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['status']?></label>
              <div class="col-sm-9">                
                <select class="form-control" name="status">
                  <option value="{null}">Pilih Status</option>  
                  <option value="0" <?=($detail->status=='0')?'selected':''?>>Unpublished</option>
                  <option value="1" <?=($detail->status=='1')?'selected':''?>>Published</option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto_header']?></label>
              <div class="col-sm-9">
                <input type="text" name="foto_header" class="form-control" id="input-foto_header" accept="image/x-png,image/jpeg" onchange="validateFileType()" hidden="true" value="<?=$detail->foto_header?>">
                <img id="img_header" src="<?=base_url('assets/berita/foto/'.$detail->foto_header)?>" width="auto" height="200px">
                <i onclick="ubah()"  class="btn btn-success" id="ubah_header">Ubah</i>
                <br><i style="display:none;margin-top: 50px;" onclick="cancel()"  class="btn btn-danger" id="cancel_header">Cancel</i>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['foto_thumbnail']?></label>
              <div class="col-sm-9">
                <input type="text" name="foto_thumbnail" class="form-control" id="input-foto_thumbnail" accept="image/x-png,image/jpeg" onchange="validateFileType2()" hidden="true" value="<?=$detail->foto_thumbnail?>">
                <img id="img_thumbnail" src="<?=base_url('assets/berita/foto/'.$detail->foto_thumbnail)?>" width="auto" height="200px">
                <i onclick="ubahThumbnail()"  class="btn btn-success" id="ubah_thumbnail">Ubah</i>
                <br><i style="display:none;margin-top: 50px;" onclick="cancelThumbnail()"  class="btn btn-danger" id="cancel_thumbnail">Cancel</i>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['tag']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="tag" placeholder="<?=$label['tag']?>" id="input-tag"><?php foreach ($tags as $data): ?><?=lcfirst($data->nama_tag)?>, <?php endforeach ?></textarea>                
                <div id="error" class="invalid-feedback"></div>
                <small>Pisahkan dengan tanda koma (,)</small>
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