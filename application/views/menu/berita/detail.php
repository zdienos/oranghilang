	<section style="margin-top: 150px; ">
		<div class="container">
			<div class="col-12 col-md-8" style=" border-right:  3px dashed #ddd;">
				<h1 class="post-title"><?=$data->judul_berita?></h1>
				<div >by <a href=""><?=$data->name?></a></div>
				<p align="center"><img src="<?=base_url('admin/assets/berita/foto/'.$data->foto_header)?>" style="width: 377px; height: 251px; margin-top: 20px; margin-bottom:20px;"></p>
				 <div><i class="fa fa-calendar fa-fw"></i> <?=date('d F Y',strtotime($data->date))?>
                 <div >
					<i class="fa fa-tag"></i> 
					<?php foreach ($tag as $tags): ?>
						<a href="<?=base_url('berita/tag/'.$tags->id_tag)?>">#<?=$tags->nama_tag?></a>,
					<?php endforeach ?>					
				</div></div>

				<?=$data->isi?>

			</p>
			</div>

			<div class="col-md-4" style="">
	                <div class="sidebar-widget-area">
	                    <h5 class="title">Wajib Dibaca</h5>
	                    <div class="widget-content">
	                        <!-- Single Blog Post -->
	                        <?php foreach ($berita_lain as $beritaL): ?>
	                        <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
	                            <div class="post-thumbnail">
	                                <img src="<?=base_url('admin/assets/berita/foto/'.$beritaL->foto_thumbnail)?>" width="150px">
	                            </div>
	                            <!-- Post Content -->
	                            <div class="post-content" style="margin-left:10px;">
	                                <a href="#" class="headline" >
	                                    <h5 class="mb-0"><?=$beritaL->judul_berita?></h5>
	                                </a>
	                            </div>
	                        </div>
	                        <?php endforeach ?>
	                        <!-- Single Blog Post -->
	                    </div>
	                </div>
			</div>		
		</div>
	</section>