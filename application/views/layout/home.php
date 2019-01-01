<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Stiki Bencana</title>
	
	<link rel="icon" type="image/png" href="<?=base_url()?>assets/favicons/favicon-16x16.png" sizes="16x16">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/fonts/font-awesome-4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?=base_url()?>assets/css/all.css"
	
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700|Source+Sans+Pro:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
</head>
<body>
	
<div id="wrapper">
		<header class="header whiteHeader">
			<div class="container">
				<div class="logo"><a href="<?=base_url()?>assets/#"></a></div>
				<nav id="nav">
					<div class="opener-holder">
						<a href="<?=base_url()?>assets/#" class="nav-opener"><span></span></a>
					</div>
					<div class="nav-drop">
						<ul>
							<li class="active visible-sm visible-xs"><a href="<?=base_url()?>assets/#">Home</a></li>
							<li><a href="<?php echo base_url('home'); ?>" >Beranda</a></li>
							<li><a href="<?=base_url()?>assets/#" >Data Profil</a></li>
							<li><a href="<?php echo base_url('berita'); ?>">Berita</a></li>							
						</ul>
						<div class="drop-holder visible-sm visible-xs">
							<span>Follow Us</span>
							<ul class="social-networks">
								<li><a class="fa fa-github" href="<?=base_url()?>assets/#"></a></li>
								<li><a class="fa fa-twitter" href="<?=base_url()?>assets/#"></a></li>
								<li><a class="fa fa-facebook" href="<?=base_url()?>assets/#"></a></li>
							</ul>
						</div>
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
<script src="<?=base_url()?>assets/js/jquery.main.js"></script>
</body>
</html>
<style type="text/css">
	.whiteHeader{
		background-color: transparent;
	}
</style>
<script type="text/javascript">
	$(window).scroll(function() {    

    var scroll = $(window).scrollTop();

    if (scroll >= 200) {
    	$(".header").removeClass("whiteHeader");
        $(".header").addClass("darkHeader");
    } else {
    	$(".header").addClass("whiteHeader");
        $(".header").removeClass("darkHeader");    
    }
});
</script>