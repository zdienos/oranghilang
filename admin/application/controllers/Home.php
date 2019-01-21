<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

  public function __construct(){
    parent:: __construct();
    $this->load->model('M_home','home');
  }

	public function index()
	{		
		if (!$this->session->userdata('login')) {
			redirect('login','refresh');
		}else{					
			$data['active'] = 'blue';
			$data['js_validation'] = 'bencana-form';
      $data['view'] = 'home/index';
      $data['title'] = 'oranghilang. | Dashboard';
      $data['row_orang_hilang_proses_pencarian'] = $this->home->getRowOrangProsesPencarian();
      $data['row_orang_hilang_ditemukan'] = $this->home->getRowOrangHilangDitemukan();
      $data['row_orang_hilang_tidak_ditemukan'] = $this->home->getRowOrangTidakDitemukan();
      $data['row_orang_hilang_ditemukan_meninggal'] = $this->home->getRowOrangHilangDitemukanMeninggal();
      $data['row_petugas'] = $this->home->getRowPetugas();
      $data['row_published_berita'] = $this->home->getRowBeritaPublished();
      $data['row_not_published_berita'] = $this->home->getRowBeritaUnpublished();
			$this->load->view('layout/home', $data);
		}
  }	
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */