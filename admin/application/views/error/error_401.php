<!DOCTYPE html>
<html>
<head>
	<title>Error 401</title>	
	<link href="<?=base_url()?>assets/style.css" rel="stylesheet">
</head>
<body>
	<div style="position: absolute; top: 0; right: 0; bottom: 0; left: 0;">
	<div class="right" id="header-content2">
		<center style="top: 28px; position: relative;">
			<h1 class="mB-30 fw-900 lh-1 c-red-500" style="font-size:60px;margin-bottom: 10px!important">401 </h1>
		    <h3 class="mB-10 fsz-lg c-grey-900 tt-c">Halo Anon !</h3>		    
		   	<p class="mB-30 fsz-def c-grey-700">Identitas kamu belum terdaftar pada sistem kami. <br>
		   	 Silahkan Login terlebih dahulu 
		   		<br>
		   		<a style="margin-top: 10px;" href="<?=base_url('login')?>" type="primary" class="btn btn-primary">Login</a>
		   	</p>	
		</center>
	  	<p style=" width: 100%;text-align: center;position: absolute;bottom: 0;left: 0;right: 0;">
	    	<img src="<?=base_url('assets/static/images/')?>401.png">
	    </p>
	</div>
	</div>
	<script>var base_url = '<?= base_url() ?>';</script>
	<script type="text/javascript" src="<?=base_url()?>assets/vendor.js"></script><script type="text/javascript" src="<?=base_url()?>assets/bundle.js"></script>
</body>
</html>