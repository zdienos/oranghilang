<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('login')) {
			redirect('error/error_401','refresh');
		}else{
			switch ($this->session->userdata('user_grup')) {
				case 'admin':
					echo "admin";
					break;
				case 'petugas':					
					redirect('error/error_403','refresh');
					break;
				case 'writer':
					redirect('error/error_403','refresh');
					break;
			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */