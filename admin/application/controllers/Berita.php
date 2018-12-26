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
		$path = base_url().'assets/ckfinder';
	  	$width='850px';
	  	$this->editor($path, $width);
		$data['js_validation'] = 'berita-form';
		$data['view'] = 'menu/berita/add_berita';
		$data['label'] = $this->berita->label();		
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
	      if ($this->berita->mAddBerita(
	        $this->input->post('judul_berita'),
	        $this->input->post('isi')
	      )) {
	        $data['success']=true;
	      }else{
	      	exit();
	      }        
	    }
	    echo json_encode($data);
	  }
	}
	function editor($path,$width) {
          //Loading Library For Ckeditor
           $this->load->library('ckeditor');
           $this->load->library('ckfinder');
           //configure base path of ckeditor folder
            $this->ckeditor->basePath = base_url().'assets/ckeditor/';
            $this->ckeditor-> config['toolbar'] = 'Full';
            $this->ckeditor->config['language'] = 'en';
            $this->ckeditor-> config['width'] = $width;
            //configure ckfinder with ckeditor config
            $this->ckfinder->SetupCKEditor($this->ckeditor,$path);
            }
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */