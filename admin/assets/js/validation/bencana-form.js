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
					window.location.href=base_url+"bencana";

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
  
  $('#form-add input').on('change', function () { 
		$(this).removeClass('is-invalid').addClass('is-valid');
		$(this).parents('.form-group').find('#error').html(" ");
		$('#info').html(" ");			  
  });
  
  $('#form-add select').on('change', function () { 
		$(this).removeClass('is-invalid').addClass('is-valid');
		$(this).parents('.form-group').find('#error').html(" ");
		$('#info').html(" ");			  
  });

  $('#form-add textarea').on('keyup', function () { 
		$(this).removeClass('is-invalid').addClass('is-valid');
		$(this).parents('.form-group').find('#error').html(" ");
		$('#info').html(" ");			  
  });
});	