function ubah() {		
	  document.getElementById('img_header').style = "display:none";
	  document.getElementById('input-foto_header').hidden = false;
	  document.getElementById('input-foto_header').type = 'file';
	  document.getElementById('input-foto_header').value = '';
	  document.getElementById('ubah_header').style = "display:none";
	  document.getElementById('cancel_header').style = "display:true";
};
function cancel() {		
	  document.getElementById('img_header').style = "display:true";
	  document.getElementById('input-foto_header').hidden = true;
	  document.getElementById('input-foto_header').type = 'text';
	  document.getElementById('input-foto_header').value = '';
	  document.getElementById('ubah_header').style = "display:true";
	  document.getElementById('cancel_header').style = "display:none";
};

function ubahThumbnail() {		
	  document.getElementById('img_thumbnail').style = "display:none";
	  document.getElementById('input-foto_thumbnail').hidden = false;
	  document.getElementById('input-foto_thumbnail').type = 'file';
	  document.getElementById('input-foto_thumbnail').value = '';
	  document.getElementById('ubah_thumbnail').style = "display:none";
	  document.getElementById('cancel_thumbnail').style = "display:true";
};
function cancelThumbnail() {		
	  document.getElementById('img_thumbnail').style = "display:true";
	  document.getElementById('input-foto_thumbnail').hidden = true;
	  document.getElementById('input-foto_thumbnail').type = 'text';
	  document.getElementById('input-foto_thumbnail').value = '';
	  document.getElementById('ubah_thumbnail').style = "display:true";
	  document.getElementById('cancel_thumbnail').style = "display:none";
};