<section class="visual">
	<div class="container">
		<div class="text-block">
			<div class="heading-holder">
				<h1>Design your sports</h1>
			</div>
			<p class="tagline">A happier & healthier life is waiting for you!</p>
			<span class="info">Get motivated now</span>
		</div>
	</div>
	<img src="<?=base_url()?>assets/images/img-bg-01.png" alt="" class="bg-stretch">
</section>
<section class="main" style="background-color: #C4C653;">
	<div class="container">
		<u><h1>Temukan Keluarga Anda</h1><br></u>
		<div class="row">
			<div class="col-md-3">
				<select class="form-control" style="height: 100%;width: 100%;font-size: 15px">
					<option>AASDASDASDASDSA</option>
					<option>AASDASDASDASDSA</option>
					<option>AASDASDASDASDSA</option>
				</select><br>
			</div>
			<div class="col-md-7">
				<input style="height: 100%;width: 100%;font-size: 15px" type="text" name="" class="form-control" placeholder="Ketikkan nama orang yang hilang"><br>
			</div>
			<div class="col-md-2">
				<button class="btn btn-primary" style="width: 100%;height: 100%;font-size: 18px"> Search</button>
			</div>
		</div>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 style="font-weight: bold;margin-left: 33%;margin-top:3%;margin-bottom: 2%;font-size: 3vw;">BERITA TERBARU</h1>
			<div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:auto;height:auto">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<?php $p=0; foreach ($berita as $data): ?>
					<?php if ($p == 1): ?>
						<li data-target="#myCarousel" data-slide-to="<?=$p++?>" class="active"></li>
					<?php else: ?>
						<li data-target="#myCarousel" data-slide-to="<?=$p++?>"></li>
					<?php endif ?>					
					<?php endforeach ?>					
				</ol>

				<!-- deklarasi carousel -->
      			<style type="text/css">
      				h1 > a{
      					text-decoration: none;
      					color: white;
      				}
      			</style>
				<div class="carousel-inner" role="listbox">
		        <?php $no=0;  foreach($berita as $data){ $no++ ?>
		          <?php if($no == 1){?>
		            <div class="item active">
								<img style="width:100%;height:400px" src="<?=base_url('admin/assets/berita/foto/'.$data->foto_header)?>" alt="">
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
								<img style="width:100%;height:400px" src="<?=base_url('admin/assets/berita/foto/'.$data->foto_header)?>" alt="">
								<div class="carousel-caption">
									<h1>
										<a href="<?=base_url('berita/detail_berita/'.$data->slug)?>">
											<?= $data->judul_berita ?>
										</a>
									</h1>								
								</div>
							</div>
		          <?php }
		        } ?>				
				</div>
      
				<!-- membuat panah next dan previous -->
				<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
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
								<h4><br><b>Nama Lengkap:</b><?=$key->nama_lengkap?></h4>
		          				<h4><b>Nama Panggilan:</b><?=$key->nama_panggilan?></h4>
		          				<h4><b>Jenis Kelamin / Umur :</b> <?=$key->nama_jenis_kelamin?>/<?=$key->umur?></h4>
		          				<h4><b>Musibah :</b> <?=$key->nama_bencana_alam?></h4>
		          				<h4><b>Status :</b> <?=$key->nama_status_org?></h4>
		          				<h3 class="text-right" style="padding-top: 5px"><b><a href="#">Detail</a></b></h3>	
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
				<div class="col-md-4" style="margin-top: 100px;">
					<div class="world-latest-articles">
						<div class="row">
							<div class="title">
								<h5>Twitter BMKG</h5>
							</div>
							<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
								<a class="twitter-timeline" class="twitter" style="margin-left:10%" data-width="auto" data-height="600" data-theme="dark" href="https://twitter.com/infoBMKG?ref_src=twsrc%5Etfw">Tweets by infoBMKG</a> <script async src="https	://platform.twitter.com/widgets.js" charset="utf-8"></script>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>