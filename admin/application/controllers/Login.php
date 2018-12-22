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
		}else{
			redirect('home','refresh');
		}
	}

	public function validate()
	{		 

        if ($this->input->server('REQUEST_METHOD') == 'POST'){
	        $this->form_validation->set_rules($this->user->rules());        
	        $this->form_validation->set_message($this->config->item('msg_error'));

	        if (!$this->form_validation->run()) {
	            $data['error_msg'] = array(               
	                'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
	                'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),                
	            );
	            $data['error'] = true;
	        }else{	        	
	        	if ($this->user->get_login()->num_rows()>0) {
	        		$data2 = $this->user->get_login()->row();
	        		$array = array(
						'login' => TRUE,
						'name'=>$data2->name,
						'email'=>$data2->email,
						'password'=>$data2->password,
						'id'=>$data2->id,						
					);					
					$data['success'] = true;
					$data['nama'] = $data2->name;
					$this->session->set_userdata( $array );
	        	}else{
	        		$data['wrong']=true;
	        		$data['wrong_msg'] = '<p class="mt-3 text-danger">Email/Password Salah</p>';
	        	}
	        }

	        echo json_encode($data);
	    }
	}

	public function logout()
	{
		$array = array(
						'login' => FALSE,
						'name'=>'',
						'email'=>'',
						'password'=>'',
						'id'=>'',						
					);
					$this->session->set_userdata( $array );	
					redirect('login','refresh');
	}
	public function haha()
	{
		redirect('coba','refresh');
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */