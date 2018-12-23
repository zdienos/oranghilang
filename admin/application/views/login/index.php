<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<title>Sign In</title>
		<style>#loader{transition:all .3s ease-in-out;opacity:1;visibility:visible;position:fixed;height:100vh;width:100%;background:#fff;z-index:90000}#loader.fadeOut{opacity:0;visibility:hidden}.spinner{width:40px;height:40px;position:absolute;top:calc(50% - 20px);left:calc(50% - 20px);background-color:#333;border-radius:100%;-webkit-animation:sk-scaleout 1s infinite ease-in-out;animation:sk-scaleout 1s infinite ease-in-out}@-webkit-keyframes sk-scaleout{0%{-webkit-transform:scale(0)}100%{-webkit-transform:scale(1);opacity:0}}@keyframes sk-scaleout{0%{-webkit-transform:scale(0);transform:scale(0)}100%{-webkit-transform:scale(1);transform:scale(1);opacity:0}}		
		</style>
		<link href="<?=base_url('assets/')?>style.css" rel="stylesheet">
	</head>
	<body class="app">
		<div id="loader">
			<div class="spinner"></div>
		</div>
		<script>window.addEventListener('load', () => {
	        const loader = document.getElementById('loader');
	        setTimeout(() => {
	          loader.classList.add('fadeOut');
	        }, 300);
	      });</script>
	      <div class="peers ai-s fxw-nw h-100vh">
	      	<div class="d-n@sm- peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url(<?=base_url('assets/')?>static/images/bg.jpg)">
	      		<div class="pos-a centerXY">
	      			<div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
	      				<img class="pos-a centerXY" src="<?=base_url('assets/')?>static/images/logo.png" alt="">
	      			</div>
	      		</div>
	      	</div>
		    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
		    	<h4 class="fw-300 c-grey-900 mB-40">Login</h4>
		    	<div id="info"></div>
		      	<?= form_open('login/validate', array('id' => 'form', 'role' => 'form','enctype'=>'multipart/from-data'));?>
		      		<div class="form-group">
		      			<label class="text-normal text-dark">Email</label> 
		      			<!-- <input type="email" name="email" class="form-control" placeholder="Email" > -->
		      			<?=form_input('email', '', array('class' => 'form-control', 'placeholder' => 'Email', 'id' => 'input-email'));?>
		      			<div id="error">cek</div>
		      		</div>

		      		<div class="form-group">
		      			<label class="text-normal text-dark">Password</label>
		      			<!-- <input type="password" name="password" class="form-control" placeholder="Password" required> -->
		      			<?= form_password('password', '', array('class' => 'form-control', 'placeholder' => 'Password', 'id' => 'input-password'));?>
		      			<div id="error"></div>
		      		</div>

		      		<div class="form-group">
		      			<div class="peers ai-c jc-sb fxw-nw">
		      				<div class="peer">
		      					<button type="submit" id="button-submit" class="btn btn-primary">Login</button>
		      				</div>
		      			</div>
		      		</div>
		      	<?= form_close()?>
		      </div>
	  </div>
	  <script>var base_url = '<?= base_url() ?>';</script>
	  <script type="text/javascript" src="<?=base_url('assets/')?>vendor.js"></script>
	  <script type="text/javascript" src="<?=base_url('assets/')?>bundle.js"></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	  <script type="text/javascript">
    $(document).ready(function() {
		    $('#error').html(" ");

		    $('#form').submit(function(e){
		    	e.preventDefault();
		    	var fa = $(this);
		        $.ajax({
		            type: "POST",
		            url: fa.attr('action'), 
		            data: $("#form").serialize(),
		            dataType: "json",  
		            success: function(data){
		                if (data.success == true) {
		                	$('#info').append('<div class="alert alert-success"> Selamat datang '+ data.nama + '</div>');
				            $('.form-group').removeClass('error')
				                            .removeClass('has-success');
				            $('.text-danger').remove();
				            !e.preventDefault();
				            setTimeout(function() {
					            window.location.href="http://localhost/stiki/admin/login";
					          }, 2000);

		                }else if (data.error == true) {
			                $.each(data.error_msg, function(key, value) {
			                    $('#input-' + key).addClass('is-invalid');
			                    $('#input-' + key).parents('.form-group').find('#error').html(value);
			                });
			            }else if(data.wrong == true){
			            	$('#info').html(data.wrong_msg);			            	
			           	}	
		            }
		        });
		        
		    });

		    $('#form input').on('keyup', function () { 
		        $(this).removeClass('is-invalid').addClass('is-valid');
		        $(this).parents('.form-group').find('#error').html(" ");
		        $('#info').html(" ");			  
		    });
		});	
	  </script>	  
	</body>
</html>