<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah User</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('user/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-12">
            <h4>Data User</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['name']?></label>
              <div class="col-sm-9">
                <?=form_input('name', '', array('class' => 'form-control', 'placeholder' => $label['name'], 'id' => 'input-name'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>       
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['email']?></label>
              <div class="col-sm-9">
                <?=form_input('email', '', array('class' => 'form-control', 'placeholder' => $label['email'], 'id' => 'input-email'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['password']?></label>
              <div class="col-sm-9">
                <?= form_password('password', '', array('class' => 'form-control', 'placeholder' => $label['password'], 'id' => 'input-password'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>     
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['id_user_grup']?></label>
              <div class="col-sm-9">
                <select class="form-control" name="id_user_grup" id="input-id_user_grup">
                  <option value="" style="display:none;" selected><?=$label['id_user_grup']?></option>
                  <?php foreach($id_user_grup as $idu){?>
                    <option value="<?= $idu->id_grup ?>"><?= $idu->nama_grup ?></option>
                  <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>         
        </div>
        <button type="submit" id="button-submit" class="btn cur-p btn-primary">Simpan</button>
      <?=form_close()?>
      </div>
    </div>
  </div>
</div>