$(document).ready(function() {
	$('#error').html(" ");
	$('#form-add').submit(function(e){
		e.preventDefault();				
		var fa = $(this);
		var formData = new FormData($("#form-add")[0]);
		$.ajax({
			type: "POST",
			url: fa.attr('action'), 
			data: formData,
			dataType: "json",  
			cache: false,
		    contentType: false,
		    processData: false,
			success: function(data){
				if (data.success == true) {
					console.log(data.success);
					window.location.href=base_url+"berita";

				}else if (data.error == true) {
					if (data.wrong_msg) {
						$('#input-foto_header').addClass('is-invalid');
						$('#input-foto_header').parents('.form-group').find('#error').html(data.wrong_msg);
					};
					if (data.wrong_msg2) {
						$('#input-foto_thumbnail').addClass('is-invalid');
						$('#input-foto_thumbnail').parents('.form-group').find('#error').html(data.wrong_msg2);
					};
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
					console.log(data.wrong_msg);
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