<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function index()
	{		
		if (!$this->session->userdata('login')) {
			redirect('login','refresh');
		}else{						
			$data['view'] = 'home/index';
			$this->load->view('layout/home', $data);
		}
	}
	
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */