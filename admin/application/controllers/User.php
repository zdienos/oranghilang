<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_user','user');
		$this->load->library('form_validation');
    	$this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
		if (!$this->session->userdata('login')) {
			redirect('error/error_401','refresh');
		}else{
			switch ($this->session->userdata('user_grup')) {
				case 'admin':
					$data['view'] = 'menu/user/user';
			        $data['user'] = $this->user->getUser();
			        $data['js_validation'] = '';
			        $this->load->view('layout/home', $data);
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

	public function add()
	{
		$data['js_validation'] = 'user-form';
		$data['view'] = 'menu/user/add_user';
		$data['label'] = $this->user->label();
		$data['id_user_grup'] = $this->user->getUserGrup();		
		$this->load->view('layout/home', $data);
	}

	public function validate()
	{
	  if ($this->input->server('REQUEST_METHOD') == 'POST'){      
	    $this->form_validation->set_rules($this->user->rulesForm());        
	    $this->form_validation->set_message($this->config->item('msg_error'));      
	    if (!$this->form_validation->run()) {
	      $data['error'] = true;
	      $data['error_msg'] = $this->user->error_msg();
	    }else{                    
	      if ($this->user->mAddUser(
	        $this->input->post('name'),
	        $this->input->post('email'),
	        $this->input->post('password'),
	        $this->input->post('id_user_grup')	        
	      )) {
	        $data['success']=true;
	      }else{
	      	exit();
	      }        
	    }
	    echo json_encode($data);
	  }
	}
	public function edit($id){
	  if($this->input->server('REQUEST_METHOD') == 'POST'){
	    $data['js_validation'] = 'user-form';
	    $user = $this->user->getUserById($id);
	    $data['view'] = 'menu/user/edit';
	    $data['label'] = $this->user->label();
	    $data['id_user_grup'] = $this->user->getUserGrup();
	    $data['detail'] = $user;
	    $this->load->view('layout/home', $data);
	  }else{
	    echo 'method not allowed';
	  }
	}

	public function update($id){
	  if ($this->input->server('REQUEST_METHOD') == 'POST'){      
	    $this->form_validation->set_rules($this->user->rulesFormEdit());        
	    $this->form_validation->set_message($this->config->item('msg_error'));      
	    if (!$this->form_validation->run()) {
	      $data['error'] = true;
	      $data['error_msg'] = $this->user->error_msgEdit();
	    }else{
	    	if ($this->input->post('password')) {
	    		$password = md5($this->input->post('password'));
	    	}else{
	    		$password = $this->user->getPasswordById($id)->password;
	    	}
	    	if ($this->user->mUpdateUser($id,$this->input->post('name'),$this->input->post('email'),$password, $this->input->post('id_user_grup'))) {
	    		$data['success']=true;
	    	}	        
	    }
	    echo json_encode($data);
	  }
	}
	public function delete($id){
	  if($this->input->server('REQUEST_METHOD') == 'POST'){
	    $this->user->deleteUser($id);
	    redirect('user','refresh');
	  }else{
	  	echo 'method not allowed';
	  }
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */