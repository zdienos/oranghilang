$(document).ready(function() {
	$('#error').html(" ");
	$('#form-add').submit(function(e){
		e.preventDefault();
		var fa = $(this);
		$('#form-add').find(':submit').attr("disabled", "disabled");
		$('#form-add').find(':submit').html("Menyimpan...");
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
					swal({
			          title: "Berhasil",
			          text: "Data Berhasil Disimpan",
			          icon: "success",
			          buttons: false,
			          timer: 3000,
			        });
					setTimeout(function(){
						window.location.href=base_url+"pendataan/"+data.redirect;
					},3000);					
				}else if (data.error == true) {
					$('#form-add').find(':submit').attr("disabled", false);
					$('#form-add').find(':submit').html("Simpan");
					if (data.wrong_msg) {
						console.log(data.wrong_msg);
						$('#input-foto').addClass('is-invalid');
						$('#input-foto').parents('.form-group').find('#error').html(data.wrong_msg);
					};
					if (data.error_msg) {
						$.each(data.error_msg, function(key, value) {
							if (value) {
								console.log(value);						
								$('#input-' + key).addClass('is-invalid');
								$('#input-' + key).parents('.form-group').find('#error').html(value);													
							}else{
								$('#input-' + key).addClass('is-valid');
							}
						});
					}
				}else if(data.wrong == true){
					$('#form-add').find(':submit').attr("disabled", false);
					$('#form-add').find(':submit').html("Simpan");
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

});	