<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_pendataan','pendataan');
	}

	public function index()
	{
		if($this->session->userdata('user_grup') == 'petugas'){
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang();
      $this->load->view('layout/home',$data);
    }else{
      echo 'nottt';
    }
  }
  
  public function oranghilang(){
    
  }

}

/* End of file Pendataan.php */
/* Location: ./application/controllers/Pendataan.php */