<style type="text/css">
    ..info-bar{background:#27bd26}
.info-bar p{padding:.5em 0;margin:0;font-size:1.2em}
.info-bar p span{color:#fff}
.info-bar p i{margin-right:.5em}
.col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
 float: left; }
.h1, h1 {

  font-size: 2.5vw;
}
.card h1 {

  color: #27bd26;
  margin: 1em 0;

}

.card h4 {
  color: #f56b09;
  margin: 1em 0;
  font-size: 1.4vw;
}
.fotokorban img {
  margin-bottom: 1%;
  margin-top: 6%;
  margin-left: 10rem;
  width: 16vw;
  height: auto;
}
.fotokorban h1{
  margin-left: 8.5rem;
}
.card p {

  color: #9e9e9e;
  font-size: 1.4vw
}
p {

  margin: 0 0 1%;

}
.card p span {

  color: #212121;
  margin-left: .25em;

}
.card {

  background: #fff;
  padding: 1em;
  margin-bottom: 2%;
  margin-top: 13%

}
@media (max-width: 768px){
.card {
    text-align: center;
}
.card p {

  color: #9e9e9e;
  font-size: 3.4vw
}
.card h4 {

  font-size: 3.4vw
}
.fotokorban h1 {
  margin-left: 0rem;
  font-size: 4vw;
}
.fotokorban img {
  margin-bottom: 1%;
  margin-top: 6%;
  margin-left: 0rem;
  width: 42%;
  height: auto;
}
.col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9 {
  position: relative;
  width: 100%;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.card {
  text-align: center;
  margin-top: 20%;
  width: 100%;
}

}
.col-xs-6 {
  width: 50%;
}
.col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
  float: left;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card m-t-4">
                <div class="row">
                <!-- <div class="col-sm-12 m-t-1 text-center info-bar">
                    <p>
                            <span><i class="fa fa-question-circle"></i> Contact the Little Rock Police Department for more information at (501) 371-4605</span>
                    </p>
                </div> -->
                <div class="col-sm-4 col-xs-6">
                  <a href="<?= base_url('oranghilang')?>" class="btn btn-primary">
                    <h3 style="padding-top: 5px"><span class="glyphicon glyphicon-arrow-left"></span> Kembali Ke Daftar</h3>
                  </a>
                </div>
                <div class="fotokorban">
                <div class="col-sm-12">                  
                  <img src="<?=base_url('admin/assets/orang_hilang/foto/'.$data_orang->foto)?>" onerror="this.src='<?=base_url("assets/images/default-user-image.png")?>'">
                <h1><?=$data_orang->nama_lengkap?>/<?=$data_orang->nama_panggilan ?$data_orang->nama_panggilan:'Tidak Diketahui'?></h1></div></div>
                <div class="col-sm-12">
               
                <div class="col-sm-4 col-xs-6"><p>Umur: <span><?=$data_orang->umur ? $data_orang->umur :'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Kategori Umur: <span><?=$data_orang->nama_kategori_umur?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Jenis Kelamin: <span><?=$data_orang->nama_jenis_kelamin?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Marga/Suku: <span><?=ucfirst($data_orang->marga_suku)?ucfirst($data_orang->marga_suku):'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Warna Kulit: <span><?=ucfirst($data_orang->warna_kulit)?ucfirst($data_orang->warna_kulit):'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Alamat: <span><?=ucfirst($data_orang->alamat) ? ucfirst($data_orang->alamat):'Tidak Diketahui'?></span></p></div>
                <div class="clearfix"></div>
                <hr />
                <div class="col-sm-12"><h4>Informasi Keberadaan Terakhir</h4></div>
                <div class="col-sm-4 col-xs-6"><p>Baju Terakhir: <span><?=ucfirst($data_orang->baju_terakhir) ? ucfirst($data_orang->baju_terakhir) : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Celana Terakhir: <span><?=ucfirst($data_orang->celana_terakhir) ? ucfirst($data_orang->celana_terakhir) : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Lokasi Terakhir: <span><?=ucfirst($data_orang->lokasi_terakhir) ? ucfirst($data_orang->lokasi_terakhir) : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Status: <span><?=$data_orang->nama_status_org?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Nama Bencana: <span><?=$data_orang->nama_bencana_alam?></span></p></div>
                <div class="clearfix"></div>
                <hr />
                <div class="col-sm-12"><h4>Informasi Keluarga</h4></div>
                <div class="col-sm-4 col-xs-6"><p>Nama Ayah: <span><?=$data_orang->nama_ayah ? $data_orang->nama_ayah : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Nama Ibu: <span><?=$data_orang->nama_ibu ? $data_orang->nama_ibu : 'Tidak Diketahui'?></span></p></div>
                <div class="clearfix"></div>
                <hr/>
                <div class="col-sm-12"><h4>Data Pelapor</h4></div>
                <div class="col-sm-4 col-xs-6"><p>Nama Pelapor: <span><?=$data_orang->nama_pelapor ? $data_orang->nama_pelapor : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>No Hp Pelapor: <span><?=$data_orang->no_hp_pelapor ? $data_orang->no_hp_pelapor : 'Tidak Diketahui'?></span></p></div>
                <div class="col-sm-4 col-xs-6"><p>Hubungan dengan Pelapor: <span><?=$data_orang->nama_hubungan_pelapor?></span></p></div>
                <div class="clearfix"></div>
                <hr/>
                <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</div>