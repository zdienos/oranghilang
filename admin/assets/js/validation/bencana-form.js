$(document).ready(function() {
	$('#error').html(" ");

	$('#form-add').submit(function(e){
		e.preventDefault();
		var fa = $(this);
		$.ajax({
			type: "POST",
			url: fa.attr('action'), 
			data: $("#form-add").serialize(),
			dataType: "json",  
			success: function(data){
				if (data.success == true) {
					$('#info').append('<div class="alert alert-success"> Selamat datang '+ data.nama + '</div>');
					$('.form-group').removeClass('error')
					.removeClass('has-success');
					$('.text-danger').remove();
					!e.preventDefault();
					setTimeout(function() {
						window.location.href=base_url+"bencana";
					}, 2000);

				}else if (data.error == true) {
					$.each(data.error_msg, function(key, value) {
						if (value) {
							console.log(value);						
							$('#input-' + key).addClass('is-invalid');
							$('#input-' + key).parents('.form-group').find('#error').html(value);													
						}else{
								$('#input-' + key).addClass('is-valid');
						}
						
					});
				}else if(data.wrong == true){
					$('#info').html(data.wrong_msg);			            	
				}	
			}
		});

	});

	$('#form-add input').on('keyup', function () { 
		$(this).removeClass('is-invalid').addClass('is-valid');
		$(this).parents('.form-group').find('#error').html(" ");
		$('#info').html(" ");			  
	});
});	