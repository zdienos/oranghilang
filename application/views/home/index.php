<section class="visual">
	<div class="container">
		<div class="text-block">
			<div class="heading-holder">
				<h1>Temukan Keluarga Anda !</h1>
			</div>
			<style type="text/css">
			.font{
				font-family: coolvetica;
			}
		</style>
		<p class="tagline"><span class="font">oranghilang</span>. akan memudahkan anda mencari</p>
		<p>orang hilang pasca bencana alam</p>
	</div>
</div>
<img src="<?=base_url()?>assets/images/img-bg-01.jpg" alt="" class="bg-stretch" style=" filter: brightness(50%); ">
</section>
<section class="main" style="background-color: #C4C653;">
	<div class="container">
		<u><h1 style="font-size: 2.8em;" class="font">Temukan Keluarga Anda Disini !</h1><br></u>
		<div class="row">
			<div class="col-md-9">
				<form style="height: 100%" action="<?= base_url('oranghilang/name')?>" method="post" id="form-search">
					<input style="height: 100%;letter-spacing: 1px;width: 100%;font-size: 20px;font-family: coolvetica" type="text" name="oranghilang" class="form-control" placeholder="Ketikkan nama orang yang hilang"><br>
				</form>
			</div>
			<div class="col-md-3">
				<button class="btn btn-primary" style="width: 100%;height: 100%;font-size: 20px;letter-spacing: 3px;font-family: coolvetica" onclick="document.getElementById('form-search').submit();"> SEARCH</button>
			</div>
		</div>
	</div>
</section>
<style type="text/css">
	.carousel-caption h1 a{
		color: white;
	}
	.carousel-caption h1 a:hover{
		color: #D6D6D6;
		text-decoration: underline;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 style="font-weight: bold;margin-left: 33%;margin-top:3%;margin-bottom: 2%;font-size: 3vw;">BERITA TERBARU</h1>
			<div class="fadeOut owl-carousel owl-theme">
				<?php $no=0;  foreach($berita as $data){ $no++ ?>
					<?php if($no == 1){?>
						<div class="item active">
							<center>
								<img src="<?=base_url('admin/assets/berita/foto/'.$data->foto_header)?>" alt="slide1" width="460" height="300">
							</center>
							<div class="carousel-caption">
									<h1>
										<a href="<?=base_url('berita/detail_berita/'.$data->slug)?>">
											<?= $data->judul_berita ?>
										</a>
									</h1>
								</div>
						</div>
					<?php }else { ?>
						<div class="item">
							<center>
								<img src="<?=base_url('admin/assets/berita/foto/'.$data->foto_header)?>" alt="slide1" width="460" height="300">
							</center>
							<div class="carousel-caption">
									<h1>
										<a href="<?=base_url('berita/detail_berita/'.$data->slug)?>">
											<?= $data->judul_berita ?>
										</a>
									</h1>
								</div>
						</div>
					<?php }
				}?>
			</div>
			<div class="text-right" style="position: relative;">
				<br>
				<h3><a href="<?=base_url('berita')?>">Read More ...</a></h3>
			</div>
			<h3>Orang Hilang Terbaru</h3><br>
			<div class="row">
				<?php foreach ($orang_hilang as $key): ?>
					<div class="col-xs-4" >
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">						
								<img src="<?=base_url('admin/assets/orang_hilang/foto/'.$key->foto)?>" 
								onerror="this.src='<?=base_url("assets/images/default-user-image.png")?>'" height="100px">
							</div>
							<div class="col-md-3"></div>
						</div>
						<div class="row">
							<div class="col-12">
								<h4><br><b>Nama Lengkap:</b><?=$key->nama_lengkap?> <?php if ($key->nama_panggilan): ?>
									/ <?=$key->nama_panggilan?>
								<?php endif ?></h4>
								<h4><b>Jenis Kelamin / Umur :</b> <?=$key->nama_jenis_kelamin?>/<?=$key->umur?></h4>
								<h4><b>Musibah :</b> <?=$key->nama_bencana_alam?></h4>
								<h4><b>Status :</b> <?=$key->nama_status_org?></h4>
								<h4><b>Keterangan :</b> <?=$key->keterangan_lainnya ? $key->keterangan_lainnya:"Tidak Diketahui"?></h4>
								<h3 class="text-right" style="padding-top: 5px"><b><a href="<?=base_url('oranghilang/'.$key->id)?>">Detail</a></b></h3>	
							</div>
						</div>
					</div>
				<?php endforeach ?>
			</div>
			<div class="text-right" style="position: relative;">
				<br>
				<h3><a href="<?=base_url('oranghilang')?>">Read More ...</a></h3>
			</div>
		</div>
		<div class="col-md-4" style="margin-top: 0px;">
			<div class="world-latest-articles">
				<div class="row">
					<div class="title">
						<h5>Twitter BMKG</h5>
					</div>
					<!-- <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s"> -->
						<a class="twitter-timeline" data-lang="id" data-height="600" data-theme="light" href="https://twitter.com/infoBMKG?ref_src=twsrc%5Etfw">@infoBMKG</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
						<!-- </div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
