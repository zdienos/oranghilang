<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Tambah Data Bencana Alam</h4>
  <div class="row">
    <div class="col-md-12">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">      
      <?= form_open('bencana/validate', array('id' => 'form-add', 'role' => 'form','enctype'=>'multipart/from-data'));?>
        <div class="row">
          <div class="col-md-6">
            <h4>Data Bencana Alam</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['jenis_bencana']?></label>
              <div class="col-sm-9">
                <select class="form-control" id="input-jenis_bencana_alam" name="jenis_bencana_alam">
                <option value="" style="display:none;" selected>Pilih Jenis Bencana</option>
                <?php foreach($jenis_bencana as $bencana){ ?>
                  <option value="<?= $bencana->id ?>"><?= $bencana->nama_jenis_bencana_alam ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['nama_bencana']?></label>
              <div class="col-sm-9">
                <?=form_input('nama_bencana_alam', '', array('class' => 'form-control', 'placeholder' => $label['nama_bencana'], 'id' => 'input-nama_bencana_alam'));?>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label is-invalid"><?=$label['tgl_waktu']?></label>
              <div class="col-sm-9">
                <input type="date" name="tgl_waktu" class="form-control" id="input-tgl_waktu">
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['keterangan']?></label>
              <div class="col-sm-9">
                <textarea class="form-control" name="keterangan" placeholder="<?=$label['keterangan']?>" id="input-keterangan"></textarea>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <h4>Data Daerah Bencana</h4><br>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['provinces']?></label>
              <div class="col-sm-9">
                <select name="id_provinces" class="form-control"  id="input-id_provinces">
                  <option value="" style="display:none;" selected>Pilih Provinsi</option>
                <?php foreach($provinces as $provincess){ ?>
                  <option value="<?= $provincess->id ?>"><?= $provincess->name_provinces ?></option>    
                <?php } ?>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['regencies']?></label>
              <div class="col-sm-9">
                <select name="id_regencies" class="form-control" id="input-id_regencies">
                  <option value="" style="display:none;" selected>Pilih Kota/Kabupaten</option>
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
             <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['districts']?></label>
              <div class="col-sm-9">
                <select name="id_districts" class="form-control" id="input-id_districts">
                  <option value="" style="display:none;" selected>Pilih Kecamatan</option>
                
                </select>
                <div id="error" class="invalid-feedback"></div>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-3 col-form-label"><?=$label['villages']?></label>
              <div class="col-sm-9">
                <select name="id_villages" class="form-control" id="input-id_villages">
                  <option value="" style="display:none;" selected>Pilih Desa</option>
                
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
<script src="<?= base_url('assets/js/jquery-2.1.4.min.js')?>"></script>
<script>
  $(document).ready(function(){
    var base_url = 'http://localhost:80/stiki/admin/bencana/'

    $("#loading").hide();
    $("#input-id_regencies").prop('disabled',true);
    $("#input-id_districts").prop('disabled',true);
    $("#input-id_villages").prop('disabled',true);
    
    $("#input-id_provinces").change(function(){
      $("#input-id_regencies").prop('disabled',false);
      $("#input-id_districts").prop('disabled',false);
      $("#input-id_villages").prop('disabled',false);
      var id_province = $('#input-id_provinces').find(":selected").val();
      $.ajax({
        type: "POST",
        url: base_url + "getregencies/"+id_province,
        dataType: "html",  
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#input-id_regencies").html(response).show();
          var id_regencie = $('#input-id_regencies').find(":selected").val();
          $.ajax({
            type: "POST",
            url: base_url + "getdistricts/"+id_regencie,
            dataType: "html",
            beforeSend: function(e) {
              if(e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
              }
            },
            success: function(response){ 
              $("#input-id_districts").html(response).show();
                var id_district = $('#input-id_districts').find(":selected").val();
          
                $.ajax({
                  type: "POST",
                  url: base_url + "getvillages/"+id_district,
                  dataType: "html",
                  beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                      e.overrideMimeType("application/json;charset=UTF-8");
                    }
                  },
                  success: function(response){ 
                    $("#input-id_villages").html(response).show();
                  },
                  error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                  }
                });
            },
            error: function (xhr, ajaxOptions, thrownError) { 
              alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
            }
          });
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); 
        }
      });
    });

    $("#input-id_regencies").change(function(){ 
      $("#input-id_districts").prop('disabled',false);
      var id_regencie = $('#input-id_regencies').find(":selected").val();
           
      $.ajax({
        type: "POST",
        url: base_url + "getdistricts/"+id_regencie,
        dataType: "html",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#input-id_districts").html(response).show();
            var id_district = $('#input-id_districts').find(":selected").val();
            
            $.ajax({
              type: "POST",
              url: base_url + "getvillages/"+id_district,
              dataType: "html",
              beforeSend: function(e) {
                if(e && e.overrideMimeType) {
                    e.overrideMimeType("application/json;charset=UTF-8");
                }
              },
              success: function(response){ 
                $("#input-id_villages").html(response).show();
              },
              error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
              }
            });
        },
        error: function (xhr, ajaxOptions, thrownError) { 
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

    $("#input-id_districts").change(function(){ 
      $("#input-id_villages").prop('disabled',false);
      var id_district = $('#input-id_districts').find(":selected").val();
      
      $.ajax({
        type: "POST",
        url: base_url + "getvillages/"+id_district,
        dataType: "html",
        beforeSend: function(e) {
          if(e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
          }
        },
        success: function(response){ 
          $("#input-id_villages").html(response).show();
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
      });
    });

  });
  </script>