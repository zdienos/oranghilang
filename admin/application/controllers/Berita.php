<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita','berita');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');		
	}

	public function index()
	{
		if($this->session->userdata('login')){
			if ($this->session->userdata('user_grup') == 'admin' || $this->session->userdata('user_grup') == 'writer') {
				$data['view'] = 'menu/berita/berita';
				$data['berita'] = $this->berita->getBerita();		        
				$data['js_validation'] = 'berita-form';
				$data['status'] = array(
					0 => 'Unpublished',
					1 => 'Published'
				);
				$this->load->view('layout/home', $data);
			}else{
				redirect('error/error_403','refresh');
			}
		}
	}

	public function add()
	{				
		$data['js_validation'] = 'berita-form';
		$data['view'] = 'menu/berita/add_berita';
		$data['editor'] = 'berita-editor';
		$data['label'] = $this->berita->label();
		$data['js']='berita';
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
					$this->berita->mAddBerita(
						$this->input->post('judul_berita'),
						$this->input->post('isi'),$foto_header,$foto_thumbnail
					);
					$tags = explode(',',ucfirst($this->input->post('tag')));
					$tag2 = array_map('trim',$tags);
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
		if(isset($_FILES["file"]["name"]))  
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
				echo base_url().'assets/content_upload/'.$_FILES['file']['name'];                                     
			}  
		} 
	}

	public function detail($id){
		if($this->input->server('REQUEST_METHOD') == 'POST'){
			$berita = $this->berita->getBeritaById($id);
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
	    	if ($this->berita->updateBerita(
	    		$this->input->post('id_user'),
	    		$this->input->post('id_berita'),
	    		$this->input->post('judul_berita'),
	    		$this->input->post('isi'),
	    		$this->input->post('status')
	    	)) {
	    		$data['success']=true;
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