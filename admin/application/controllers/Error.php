<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends CI_Controller {

	public function error_404()
	{
		//not found
		$this->load->view('error/error_404');	
	}

	public function error_403()
	{
		//forbidden
		$this->load->view('error/error_403');	
	}

	public function error_401()
	{
		//not authorized
		$this->load->view('error/error_401');	
	}
}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */