<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
	      redirect('error/error_401','refresh');
	    }    
	    if (strcasecmp($this->session->userdata('user_grup'),'writer') == 0 && strcasecmp($this->session->userdata('user_grup'),'petugas') == 0) {
	      redirect('error/error_403','refresh');      
	    }
		$this->load->model('m_user','user');
    	$this->load->library('form_validation');
    	$this->load->library('datatables');
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
              $data['datatables'] = 'datatables-user';
              $data['datatablescss'] = 'css';
              $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
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
  
  public function json(){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      header('Content-Type: application/json');
      echo $this->user->json();
    }else{
      echo 'Method not allowed!';
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
	      if ($this->user->getEmail($this->input->post('email',TRUE))) {
	      	$data['error'] = true;
	      	$data['error_msg'] = array(
	      		'email' => 'Email sudah dipakai'
	      	);
	      }               
	      else{
	      	$this->user->mAddUser(
		        $this->input->post('name', TRUE),
		        $this->input->post('email',TRUE),
		        $this->input->post('password',TRUE),
		        $this->input->post('id_user_grup',TRUE)	        
		      );
	      	$data['success']=true;
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
	    	if ($this->user->getEmail($this->input->post('email',TRUE))) {
		      	$data['error'] = true;
		      	$data['error_msg'] = array(
		      		'email' => 'Email sudah dipakai'
		      	);
		    }
	    	if ($this->input->post('password')) {
	    		$password = md5($this->input->post('password'),TRUE);
	    	}else{
	    		$password = $this->user->getPasswordById($id)->password;
	    	}
	    	if ($this->user->mUpdateUser($id,$this->input->post('name',TRUE),$this->input->post('email',TRUE),$password, $this->input->post('id_user_grup'),TRUE)) {
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