<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Oranghilang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_oranghilang','orang_hilang');
	}

	public function index()
	{
		$data['model'] = $this->orang_hilang->view(); 
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