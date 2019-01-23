<?php $this->session->set_userdata('url_back_search',current_url()); ?>

<br><br><br><br>
	<center>
		<h1><b><u>Daftar Orang Hilang</u></b></h1><br>
	<section>
		<div class="container" >
			<div class="row">				
				<?php foreach ($model['orang_hilang'] as $key): ?>
				<div class="col-xs-6 " style="border-radius:10px;border: 1px black solid;">
					<div class="row">
						<div class="col-md-4 " style="margin-top: 20px; margin-bottom: 20px;">
							<img src="<?=base_url('admin/assets/orang_hilang/foto/'.$key->foto)?>" onerror="this.src='<?=base_url("assets/images/default-user-image.png")?>'" width="100%">							
						</div>				
						<div class="col-md-8" style="margin-top: 30px;">
							<?php if ($key->nama_panggilan): ?>
								<h2><a href="<?=base_url('oranghilang/detail_orang/'.$key->id_orang)?>"><?=$key->nama_lengkap?>/<?=$key->nama_panggilan?$key->nama_panggilan:'-'?></a></h2>
							<?php else: ?>
								<h2><a href=""><?=$key->nama_lengkap?></a></h2>
							<?php endif ?>							
							<p>
								<p>Umur: <?=$key->umur?><br/>
								   Tanggal Laporan: <span></span><?=$key->tgl_laporan?></span><br />								   
								   Bencana Alam : <span><?=$key->nama_bencana_alam?></span><br>
								   Status : <span><?=$key->nama_status_org?></span><br>
								   Keterangan : <span><?=$key->keterangan_lainnya ? $key->keterangan_lainnya :'Tidak Diketahui'?></span><br>
								   <a href="<?=base_url('oranghilang/detail_orang/'.$key->id_orang)?>" class="btn" type="button" style="background: gray;color: white;" >Details</a>
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
	</section>
	</center>