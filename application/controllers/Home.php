<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('M_berita','berita');
  }

	public function index()
	{
		$data['tittle'] = 'Home';
    $data['view'] = 'home/index';
    $data['berita'] = $this->berita->getBeritaCarousel();
    $data['kotak'] = $this->berita->getBeritaKotak();
		$this->load->view('layout/home', $data);
  }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */