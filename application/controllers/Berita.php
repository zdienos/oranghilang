<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function index()
	{
		$data['view'] = 'menu/berita/index';
		$this->load->view('layout/home', $data);
	}

	public function detail_berita()
	{
		$data['view'] = 'menu/berita/detail';
		$this->load->view('layout/home', $data);
	}

}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */