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
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */