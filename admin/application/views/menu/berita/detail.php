<div class="container-fluid">
  <h4 class="c-grey-900 mT-10 mB-30">Detail Berita 
    <button class="<?=($detail->status=='0')?'btn btn-danger':'btn cur-p btn-success'?>" style="position: absolute;right: 0;margin-right: 35px">
      <?=($detail->status=='0')?'Unpublished':'Published'?>
    </button>
  </h4>
  <div class="row">
    <div class="col-md-8">
      <div class="bgc-white bd bdrs-3 p-20 mB-20">            
        <!-- <h1><?=$detail->judul_berita?></h1> -->
        <h1><?=$detail->judul_berita?></h1>
        <div class="image">
          <img src="<?php echo base_url('assets/berita/foto/');echo $detail->foto_header?>">
        </div>
        <h7><?=$detail->date?>, Oleh : <?=$detail->name?></h7>
        <div class="container">
          <?=$detail->isi?>
        </div>
      </div>
      <a href="<?=base_url('berita')?>">
        <button type="button" class="btn cur-p btn-primary">Kembali</button>
      </a>
    </div>
    <div class="col-md-4">
      <div class="bgc-white bd bdrs-3 p-20 mb-20">
        <h3><u>Tag</u></h3>
        <?php foreach ($tags as $data): ?>
          #<?=$data->nama_tag?>
        <?php endforeach ?>
        <!-- <div class="image" style="height: 140px;background-color: red">
          <center><h7 style="color: white">Thumbnail</h7></center>
        </div>-->
      </div> <br>
      <div class="bgc-white bd bdrs-3 p-20 mb-20">
        <h3><u>Most Viewed</u></h3>
          <div class="row">
            <div class="col-md-4">
              <img src="<?php echo base_url('assets/berita/foto/');echo $detail->foto_thumbnail?>">
            </div>
            <div class="col-md-8">
              <?=$detail->judul_berita?><br>
              <?=$detail->date?>
            </div>
          </div>               
      </div> 
    </div>
  </div>
</div>