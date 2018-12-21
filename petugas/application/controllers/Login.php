<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
   
  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user','user');
		$this->load->library('form_validation');
	}

	public function index()
	{
    if(!$this->session->userdata('login')){
      $this->load->view('login/index');
    }else{
      $this->load->view('login/index');
    }
  }
  
  public function login(){
    $this->load->view('login/index');
  }

  public function validate(){
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
      $this->form_validation->set_rules($this->user->rules());        
      $this->form_validation->set_message($this->config->item('msg_error'));

      if (!$this->form_validation->run()) {
          $data['error'] = true;
          $data['error_msg'] = array(               
            'email' => form_error('email', '<p class="mt-3 text-danger">', '</p>'),
            'password' => form_error('password', '<p class="mt-3 text-danger">', '</p>'),                
        );
      }else{	        	
        if ($this->user->getEmail($this->input->post('email'))->num_rows() == 0 ) {
          $data['wrong'] = true;
          $data['wrong_msg'] = '<p class="mt-3 text-danger">Email tidak terdaftar!</p>';
        }else{
          if($this->user->userLogin($this->input->post('email'),md5($this->input->post('password')))->num_rows() > 0){
            $data2 = $this->user->userLogin($this->input->post('email'),md5($this->input->post('password')))->row();
            $array = array(
              'login' => true,
              'name' => $data2->name,
              'email' => $data2->email,
              'password' => $data2->password,
              'id' => $data2->id,
              'user_grup' => $data2->nama_grup		
            );					
            $data['success'] = true;
            $data['nama'] = $data2->name;
            $this->session->set_userdata($array);
          }else{
            $data['wrong'] = true;
            $data['wrong_msg'] = '<p class="mt-3 text-danger">Password salah!</p>';
            
          }
        }
      }
      echo json_encode($data);
    }else{
      echo "method not allowed";
    }
  }

  public function sukses(){
    echo 'suksess';
  }
}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */