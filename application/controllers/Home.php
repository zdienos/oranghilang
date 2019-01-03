<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('m_berita','berita');
    $this->load->model('m_oranghilang','orang_hilang');
  }

	public function index()
	{
		$data['tittle'] = 'Home';
    $data['view'] = 'home/index';
    $data['orang_hilang'] = $this->orang_hilang->getLimit();
    $data['berita'] = $this->berita->getBeritaCarousel();
    $data['kotak'] = $this->berita->getBeritaKotak();
		$this->load->view('layout/home', $data);
  }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */