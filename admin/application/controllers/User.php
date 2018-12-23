<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
		if (!$this->session->userdata('login')) {
			redirect('login','refresh');
		}else{
			switch ($this->session->userdata('user_grup')) {
				case 'admin':
					echo "admin";
					break;
				case 'petugas':					
					echo "petugas";
					break;
				case 'writer':
					echo "writer";
					break;
			}
		}
	}

}

/* End of file User.php */
/* Location: ./application/controllers/User.php */