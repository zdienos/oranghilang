<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oranghilang extends CI_Controller {

	public function index()
	{
		$data['view'] = 'menu/orang_hilang/index';
		$this->load->view('layout/home', $data);
	}

	public function detail_orang()
	{
		$data['view'] = 'menu/orang_hilang/detail';
		$this->load->view('layout/home', $data);
	}

}

/* End of file Oranghilang.php */
/* Location: ./application/controllers/Oranghilang.php */