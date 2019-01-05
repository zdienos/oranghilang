<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('error/error_401','refresh');
		}    
		if (strcasecmp($this->session->userdata('user_grup'),'petugas') == 0) {
			redirect('error/error_403','refresh');      
		}
		$this->load->model('m_berita','berita');
		$this->load->library('form_validation');
		$this->load->library('datatables');
		$this->form_validation->set_error_delimiters('', '');		
	}

	public function index()
	{
		if($this->session->userdata('login')){
			if ($this->session->userdata('user_grup') == 'admin' || $this->session->userdata('user_grup') == 'writer') {
				$data['view'] = 'menu/berita/berita';
				$data['berita'] = $this->berita->getBerita();		        
				$data['js_validation'] = 'berita-form';
				$data['datatablescss'] = 'css';
				$data['datatables'] = 'datatables-berita';
				$data['status'] = array(
					0 => 'Unpublished',
					1 => 'Published'
        );
        $data['title'] = 'oranghilang. | Berita';
				$this->load->view('layout/home', $data);
			}else{
				redirect('error/error_403','refresh');
			}
		}
	}

	public function json(){
	if($this->input->server('REQUEST_METHOD') == 'POST'){
			header('Content-Type: application/json');
			echo $this->berita->json();
		}else{
			echo 'Method not allowed!';
		}		
	}

	public function add()
	{				
		$data['js_validation'] = 'berita-form';
		$data['view'] = 'menu/berita/add_berita';
		$data['editor'] = 'berita-editor';
		$data['label'] = $this->berita->label();
    $data['js']='berita';
    $data['title'] = 'oranghilang. | Tambah Berita';
		$this->load->view('layout/home', $data);
	}

	public function validate()
	{
		if ($this->input->server('REQUEST_METHOD') == 'POST'){      
			$this->form_validation->set_rules($this->berita->rules());        
			$this->form_validation->set_message($this->config->item('msg_error'));
			if (!$this->form_validation->run()) {
				$data['error'] = true;
				$data['error_msg'] = $this->berita->error_msg();
			}else{				
				$judul =$this->input->post('judul_berita');
				$tanggal = date("Y_m_d H:i:s");
				$this->load->library('upload'); 
				$config['upload_path'] = './assets/berita/foto';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']  = '2048';		
				$foto_header=''	;
				$foto_thumbnail='';
				if (isset($_FILES["foto_header"]["name"])) {
					$config['file_name']  = "header_".md5($tanggal);
					$this->upload->initialize($config);	
					if ( ! $this->upload->do_upload('foto_header')){
						$data['error'] = true;
						$data['wrong_msg'] = $this->upload->display_errors();
					}	else{
						$foto_header = $this->upload->data('file_name');
						$data['mm']=$foto_header;
					}
				}
				if (isset($_FILES["foto_thumbnail"]["name"])) {
					$config['file_name']  = "thumbnail_".md5($tanggal);
					$this->upload->initialize($config);	
					if ( ! $this->upload->do_upload('foto_thumbnail')){
						$data['error'] = true;
						$data['wrong_msg2'] = $this->upload->display_errors();
					}	else{
						$foto_thumbnail = $this->upload->data('file_name');
						$data['c']=$foto_thumbnail;
					}
				}
				if ($foto_thumbnail!==''&&$foto_header!=='') {
					$string=preg_replace('~[^\pL\d]+~u', '-', $this->input->post('judul_berita'));
					$trim=trim($string);
					$pre_slug=strtolower(str_replace(" ", "-", $trim));
					$slug=$pre_slug.'.html';
					$this->berita->mAddBerita(
						$this->input->post('judul_berita'),
						$this->input->post('isi'),$foto_header,$foto_thumbnail,$slug
					);
					$tags = explode(',',rtrim($this->input->post('tag'),','));
					$tagss = array_map('trim', $tags);
					$tag2 = array_unique(array_map('ucfirst',$tagss));

					$allTag = $this->berita->getAllTag();
					for($i=0;$i<count($tag2);$i++){
						if ($this->berita->getWhereTag($tag2[$i])) {
							$id_tag = $this->berita->getTagByName($tag2[$i])->id_tag;
							$this->berita->insertTagsBerita($id_tag);
						}else{
							$this->berita->insertTag(ucfirst($tag2[$i]));
							$this->berita->insertTagsBeritaAll();
						}
					}
					$data['success']=true;
				}				
			}
			echo json_encode($data);
		}
	}
	public function save()
	{
		if(isset($_FILES["file"]["files"]))  
		{  
			$config['upload_path'] = './assets/content_upload/';  
			$config['allowed_types'] = 'jpg|jpeg|png|gif';  
			$this->load->library('upload', $config);  
			if(!$this->upload->do_upload('file'))  
			{  
				echo $this->upload->display_errors();  
			}  
			else  
			{  
				$data = $this->upload->data();                 
				echo base_url().'assets/content_upload/'.$_FILES['file']['files'];                                     
			}  
		} 
	}

	public function detail($id){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$berita = $this->berita->getBeritaById($id);
			$data['title'] = 'oranghilang. | Detail Berita';
			$data['editor'] = 'berita-disabled';			
			$data['view'] = 'menu/berita/detail';
			$data['label'] = $this->berita->label();
			$data['tags'] = $this->berita->getTagsBeritaById($berita->id_berita);
			$data['detail'] = $berita;
			$this->load->view('layout/home', $data);
		}else{
			echo 'method not allowed';
		}
	}

	public function edit($id){
		if($this->input->server('REQUEST_METHOD') == 'POST'){	    
			$berita = $this->berita->getBeritaById($id);
			$data['js_validation'] = 'berita-form';
			$data['editor'] = 'berita-editor';
			$data['view'] = 'menu/berita/edit';
			$data['title'] = 'oranghilang. | Edit Berita';
			$data['js']='berita';
			$data['js2']='berita-edit';
			$data['tags'] = $this->berita->getTagsBeritaById($berita->id_berita);
			$data['label'] = $this->berita->label();	    
			$data['detail'] = $berita;
			$this->load->view('layout/home', $data);
		}else{
			echo 'method not allowed';
		}
	}

	public function update($id){
		if ($this->input->server('REQUEST_METHOD') == 'POST'){      
			$this->form_validation->set_rules($this->berita->rulesFormEdit());        
			$this->form_validation->set_message($this->config->item('msg_error'));      
			if (!$this->form_validation->run()) {
				$data['error'] = true;
				$data['error_msg'] = $this->berita->error_msgEdit();
			}else{				
				$tags = explode(',',rtrim($this->input->post('tag'),','));
				$tag2 = array_map('trim', $tags);
				$tag = array_unique(array_map('ucfirst',$tag2));	
				$allTag = $this->berita->getAllTag();
				$tag_sql = '"'.implode('","', $tag).'"';
				$not_tag = $this->berita->checkTagsBeritaName2($this->input->post('id_berita'),$tag_sql);			
				if ($not_tag) {
					foreach ($not_tag as $mm) {
						$this->berita->deleteTagsBerita($mm->id_berita,$mm->id_tag);
					}
				}

				for($i=0;$i<count($tag);$i++){
					if (!$this->berita->checkTagsBeritaName($tag[$i])) {
						if ($this->berita->getWhereTag($tag[$i])) {						
							$id = $this->berita->getTagByName($tag[$i])->id_tag;
							$this->berita->inserTagBeritaIdTag($this->input->post('id_berita'),$id);
						}else{
							$this->berita->insertTag(ucfirst($tag[$i]));
							$this->berita->insertTagsBeritaIdBerita($this->input->post('id_berita'));
						}
					}
				}
				$judul =$this->input->post('judul_berita');
				$tanggal = date("Y_m_d H:i:s");
				$this->load->library('upload'); 
				$config['upload_path'] = './assets/berita/foto';
				$config['allowed_types'] = 'jpg|png|jpeg';
				$config['max_size']  = '2048';		
				$foto_header=''	;
				$foto_thumbnail='';
				if (isset($_FILES["foto_header"]["name"])) {
					$config['file_name']  = "header_".md5($tanggal);
					$this->upload->initialize($config);	
					if ( ! $this->upload->do_upload('foto_header')){
						$data['error'] = true;
						$data['wrong_msg'] = $this->upload->display_errors();
					}	else{
						$foto_header = $this->upload->data('file_name');						
					}
				}else{
					$foto_header = $this->berita->getFotoByIdBerita($this->input->post('id_berita'))->foto_header;
				}
				if (isset($_FILES["foto_thumbnail"]["name"])) {
					$config['file_name']  = "thumbnail_".md5($tanggal);
					$this->upload->initialize($config);	
					if ( ! $this->upload->do_upload('foto_thumbnail')){
						$data['error'] = true;
						$data['wrong_msg2'] = $this->upload->display_errors();
					}	else{
						$foto_thumbnail = $this->upload->data('file_name');						
					}
				}else{
					$foto_thumbnail = $this->berita->getFotoByIdBerita($this->input->post('id_berita'))->foto_thumbnail;
				}				
				if ($foto_header !==''&&$foto_thumbnail!=='') {
					$this->berita->updateBerita($this->input->post('id_user'),
						$this->input->post('id_berita'),
						$this->input->post('judul_berita'),
						$this->input->post('isi'),
						$foto_header,$foto_thumbnail,
						$this->input->post('status'));
					$data['success'] = true;
				}
			}
			echo json_encode($data);
		}
	}

	public function delete($id){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$this->berita->deleteBerita($id);
			redirect('berita','refresh');
		}else{
			echo 'method not allowed';
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */