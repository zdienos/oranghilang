<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Berita extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_berita','berita');
	}

	public function index()
	{		
		$data['model'] = $this->berita->view(); 
		$data['view'] = 'menu/berita/index';
		$this->load->view('layout/home', $data);
	}

	public function detail_berita($slug)
	{
		if ($slug) {
			if ($this->berita->checkSlug($slug)) {
				$data['data'] = $this->berita->getBeritaById($slug);
				$data['tag'] = $this->berita->getTagsBeritaByIdBerita($slug);
				$data['berita_lain'] = $this->berita->getBeritaLain($slug);
				$data['view'] = 'menu/berita/detail';
				$this->load->view('layout/home', $data);		
			}else{
				redirect('error/error_404','refresh');
			}
		}else{
			redirect('error/error_404','refresh');
		}
	}
}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */