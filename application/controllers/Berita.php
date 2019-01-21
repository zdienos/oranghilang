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
		$data['judul_berita'] = 'Latest Article';
		$data['tittle'] = 'oranghilang. | Berita Terbaru';
		$data['model'] = $this->berita->view(); 
		$data['view'] = 'menu/berita/index';
		$this->load->view('layout/home', $data);
	}

	public function user($id_user)
	{
		if ($id_user) {
			if ($this->berita->checkUser($id_user)) {
				$nama = $this->berita->getName($id_user);
				$data['judul_berita'] = 'Berita berdsarkan writer '.$nama->name;
				$data['tittle'] = 'oranghilang. | Berita';
				$data['model'] = $this->berita->viewUser($id_user); 				
				$data['view'] = 'menu/berita/index';
				$this->load->view('layout/home', $data);
			}else{
				$data['tittle'] = 'oranghilang. | Berita';
				$data['judul_berita'] = 'Berita Not Found';
				$data['view'] = 'menu/berita/index';
				$data['model']	= null;
				$this->load->view('layout/home', $data);
			}
		}else{
			redirect('error/error_404','refresh');
		}
	}

	public function detail_berita($slug)
	{
		if ($slug) {
			if ($this->berita->checkSlug($slug)) {
				$data['data'] = $this->berita->getBeritaById($slug);
				$cek = $data['data'];
				$data['tittle'] = "oranghilang. | ".$cek->judul_berita;
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

	public function tag($nama_tag)
	{
		if ($nama_tag) {
			if ($this->berita->checkTagsBerita($nama_tag)) {				
				$data['judul_berita'] = '#'.$nama_tag;
				$data['tittle'] = 'oranghilang. | Berita';
				$data['model'] = $this->berita->viewTag($nama_tag); 				
				$data['view'] = 'menu/berita/index';
				$this->load->view('layout/home', $data);
			}else{
				$data['tittle'] = 'oranghilang. | Berita';
				$data['judul_berita'] = 'Tag Not Found';
				$data['view'] = 'menu/berita/index';
				$data['model']	= null;
				$this->load->view('layout/home', $data);
			}
		}else{
			redirect('error/error_404','refresh');
		}
	}

	
}

/* End of file Berita.php */
/* Location: ./application/controllers/Berita.php */