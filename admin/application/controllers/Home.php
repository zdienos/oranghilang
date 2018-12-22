<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

	public function index()
	{		
		if (!$this->session->userdata('login')) {
			redirect('login','refresh');
		}else{
			$this->load->view('home/index');
		}
	}
	
	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */