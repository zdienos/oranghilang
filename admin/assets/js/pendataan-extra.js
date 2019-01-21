function ubah_foto() {	
	document.getElementById('input-foto').disabled=false;
	document.getElementById('input-foto').value='';
	document.getElementById('input-foto').type='file';
	document.getElementById('cancel-foto').style='display:true';
	document.getElementById('br').style='display:true';
}
function cancel_foto() {	
	document.getElementById('input-foto').type='text';
	document.getElementById('input-foto').value='Klik Untuk Upload';
	document.getElementById('cancel-foto').style='display:none';
	document.getElementById('br').style='display:none';
}
function ubah() {		
	  document.getElementById('foto').style = "display:none";
	  document.getElementById('input-foto').hidden = false;
	  document.getElementById('input-foto').type = 'file';
	  document.getElementById('tambah_foto').style = "display:none";
	  document.getElementById('input-foto').value = '';
	  document.getElementById('hapus_foto').style = "display:none";
	  document.getElementById('ubah_foto').style = "display:none";
	  document.getElementById('cancel_foto').style = "display:true";
};
function cancel() {		
	  document.getElementById('foto').style = "display:true";
	  document.getElementById('input-foto').hidden = true;
	  document.getElementById('input-foto').type = 'text';
	  document.getElementById('hapus_foto').style = "display:true";
	  document.getElementById('input-foto').value = '';
	  document.getElementById('tambah_foto').style = "display:none";
	  document.getElementById('ubah_foto').style = "display:true";
	  document.getElementById('cancel_foto').style = "display:none";
};
function hapus() {		
	  document.getElementById('foto').style = "display:none";
	  document.getElementById('tambah_foto').style = "display:true";
	  document.getElementById('ubah_foto').style = "display:none";
	  document.getElementById('cancel_foto').style = "display:none";
	  document.getElementById('hapus_foto').style = "display:none";
	  document.getElementById('input-foto').hidden = true;
	  document.getElementById('input-foto').type = 'text';
	  document.getElementById('input-foto').value = 'hapus';	  	  
};