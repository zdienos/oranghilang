<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?=$tittle?></title>
	
	<link rel="icon" type="text/css" href="<?=base_url('admin/assets/search.png')?>">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/all.css">

	<link rel="stylesheet" href="<?=base_url()?>/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/owlcarousel/assets/owl.theme.default.min.css">

	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>


</head>
<body>
	
<div id="wrapper">	
		<header class="header darkHeader">
			<div class="container">
				<?php
				$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				?>
				<style type="text/css">
				@font-face {
				  font-family: coolvetica;
				  src: url(<?=base_url('assets/fonts/coolvetica.ttf')?>);
				}
					.logo > a{
						letter-spacing: 1px;
						font-family: coolvetica;
						text-decoration: none;
						color: white;
						font-size: 2em;
					}
					.nav-drop > ul > li > a{
						font-family: coolvetica;
						letter-spacing: 2px;
						font-size: 1.1em;
					}
				</style>
				<div class="logo"><a href="<?=base_url()?>#">oranghilang.</a></div>
				<nav id="nav">
					<div class="opener-holder">
						<a href="<?=$actual_link?>#" class="nav-opener"><span></span></a>
					</div>
					<div class="nav-drop">
						<ul>
							<?php if ($tittle == "oranhilang. | Data Orang Hilang"): ?>
							<li class="active">
							<?php else: ?>
							<li>
							<?php endif ?>							
								<a href="<?=base_url('oranghilang')?>" >Data Orang Hilang</a>
							</li>
							<?php if ($tittle == "oranhilang. | Berita Terbaru"): ?>
							<li class="active">
							<?php else: ?>
							<li>
							<?php endif ?>	
								<a href="<?php echo base_url('berita'); ?>">Berita</a>
							</li>
						</ul>					
					</div>
				</nav>
			</div>
		</header>
	
	<div >
		 <?php $this->load->view($view);?>
	</div>
	<br>
	<section style="background-color:rgb(216, 88, 37);" class="footer"> 
		<br>
		<div class="container">
			<h1 class="text-center" style="font-size:30px;color: white">
				Lembaga Terkait
			</h1><br>
			<center>
				<img style="padding-right:10px;" src="<?=base_url()?>assets/images/fot1.png" style="width:auto;height:auto" class="rounded" alt="">
				<img src="<?=base_url()?>assets/images/fot2.png" style="width:auto;height:auto" class="rounded " alt="">
				<img src="https://cdn.bmkg.go.id/Web/Logo-BMKG-new.png" style="width: 90px;height: 92px;" class="">
				<img src="https://upload.wikimedia.org/wikipedia/id/thumb/7/7f/Logobsnbsr.gif/180px-Logobsnbsr.gif" width="105px" height="90px">
			</center>
		</div>
		<br>
	</section>
	<section style="background-color:rgb(167, 66, 26);" class="footer">
		<div class="container" style="padding-bottom: 10px;padding-top: 10px;color: black">
			<center>
				<h3>&copy; 2018 OrangHilang</h3>
			</center>
		</div>
	</section>
<script src="<?=base_url()?>assets/js/jquery-1.11.2.min.js"></script>
<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
<script src="<?=base_url()?>/assets/owlcarousel/owl.carousel.js"></script>
<script src="<?=base_url()?>assets/js/jquery.main.js"></script>
</body>
</html>
<style type="text/css">
	.whiteHeader{
		background-color: transparent!important;
	}
</style>
</script>
<script>
            jQuery(document).ready(function($) {
              $('.fadeOut').owlCarousel({
                items: 1,
                animateOut: 'fadeOut',
                autoplay:true,
                autoplayTimeout:5000,
                loop: true,
                margin: 10,
              });              
            });
          </script>