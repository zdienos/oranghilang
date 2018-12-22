<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
		$this->load->library('form_validation');
	}

	public function index()
	{
		if (!$this->session->userdata('login')) {
			$this->load->view('login/index');
		}
	}

	public function validate()
	{		 

        $json = array();        
        $this->form_validation->set_rules($this->user->rules());        
        $this->form_validation->set_message($this->config->item('msg_error'));

        if (!$this->form_validation->run()) {
            $json = array(               
                'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
                'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),                
            );
        }

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($json));
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */