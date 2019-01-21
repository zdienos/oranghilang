<div class="container-fluid" style="background-color: white;padding: 2%;white-space: wrap;">  
  <?= form_open('cetak/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>  
   <div class="col-md-12">
            <h4>Export Data oranghilang</h4><br>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Status Oranghilang</label>
              <div class="col-sm-8">
                <select class="form-control" id="input-status" name="status">
                <option value="" style="display:none;" selected>Pilih Status</option>
                <?php foreach($status_oranghilang as $status){ ?>
                  <option value="<?= $status->id ?>"><?= $status->nama_status_org ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>       
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nama Bencana Alam</label>
              <div class="col-sm-8">
                <select class="form-control" id="input-bencana_alam" name="bencana_alam">
                <option value="" style="display:none;" selected>Pilih Status</option>
                <?php foreach($bencanaalam as $bencana){ ?>
                  <option value="<?= $bencana->id ?>"><?= $bencana->nama_bencana_alam ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>            
            <div class="form-group row">              
              <div class="col-sm-9">
                <input type="submit" name="submit" class="btn btn-primary" value="Export Excel">
              </div>
            </div>
          </div>
  <?php form_close();?>
  <a href="#"></a>
</div>      