<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function index()
	{		
		if (!$this->session->userdata('login')) {
			redirect('login','refresh');
		}else{			
			switch($this->session->userdata('user_grup')){
        case 'admin':
          $data['view']='home/index';			
          $this->load->view('layout/home', $data);
          break;
        case 'petugas':
          $data['view']='home/index';			
          $this->load->view('layout/home', $data);
          break;
      }
		}
	}
	
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */