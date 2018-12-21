<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
   
  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_user','user');
		$this->load->library('form_validation');
	}

	public function index()
	{
    if(!$this->session->userdata('login')){
      $this->session->set_flashdata('fail','You must login first!');
      redirect('login','refresh');
    }else{

    }
  }
  
  public function login(){
    $this->load->view('login/index');
  }

}

/* End of file Error.php */
/* Location: ./application/controllers/Error.php */