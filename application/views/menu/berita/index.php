		<section>
		  <div class="container">

			<div class="col-md-8 " style="margin-top: 90px;  border-right:  3px dashed #ddd; ">
				<div class="world-latest-articles">
	                <div class="row">
	                    <div class="col-12 col-lg-11">
	                        <div class="title">
	                            <h5>Latest Articles</h5>
	                        </div>	                    
	                        <?php foreach ($model['berita'] as $data): ?>
	                        <!-- Single Blog Post -->
	                        <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">		                        	
	                            <!-- Post Thumbnail -->
	                            <div class="post-thumbnail">
	                                <img src="<?=base_url('admin/assets/berita/foto/'.$data->foto_thumbnail)?>" alt="" width="100%">
	                            </div>
	                            <!-- Post Content -->
	                            <div class="post-content">	                                
									<br><h2><?=$data->judul_berita?></h2>
	                                <?php
	                                $string = strip_tags($data->isi);
									if (strlen($string) > 500) {

									    // truncate string
									    $stringCut = substr($string, 0, 200);
									    $endPoint = strrpos($stringCut, ' ');

									    //if the string doesn't contain any space then it will cut without word basis.
									    $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
									    $string .= '... <a href="'.base_url('berita/detail_berita/'.$data->id_berita).'">Read More</a>';
									}
									echo $string;
	                                ?>
	                                <div class="post-meta">
	                                    <p>
	                                    	<a href="#" class="post-author"><?=$data->name?></a> on 
	                                    	<a href="#" class="post-date"><?=date('d F Y',strtotime($data->date))?></a>
	                                	</p>
	                                </div>
	                            </div>
	                        </div>
	                        <?php endforeach ?>
	                    </div>
	                    <?php
						  // Tampilkan link-link paginationnya
						  echo $model['pagination'];
						  ?>
	                </div>
            	</div>
			</div>
				
			<div class="col-md-3 " style="margin-top: 90px; margin-left: 50px; " >
				<div class="world-latest-articles">
					<div class="row">
						<div class="title">
							<h5>Twitter BMKG</h5>
						</div>
					<div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
						<a class="twitter-timeline" class="twitter" data-width="300" data-height="700" data-theme="dark" href="https://twitter.com/infoBMKG?ref_src=twsrc%5Etfw">Tweets by infoBMKG</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					</div>
				</div>
				
			</div>
		  </div>	
		</section>