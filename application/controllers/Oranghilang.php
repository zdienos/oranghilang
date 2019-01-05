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
		$data['tittle'] = 'oranhilang. | Data Orang Hilang';
		$data['model'] = $this->orang_hilang->view(); 
		$data['view'] = 'menu/orang_hilang/index';
		$this->load->view('layout/home', $data);
	}

	public function detail_orang($id)
	{		
		$data['data_orang'] = $this->orang_hilang->getDetailOrangById($id);
		$data['tittle'] = $this->orang_hilang->getDetailOrangById($id)->nama_lengkap;
		$data['view'] = 'menu/orang_hilang/detail';
		$this->load->view('layout/home', $data);
  }
  
  public function name(){
    $name = $this->input->post('oranghilang');
    redirect('oranghilang/search/'.$name,'refresh');
  }

  public function search($name=null){
    if(isset($name)){
      $data['tittle'] = 'oranhilang. | Data Orang Hilang';
      $viewsearch = $this->orang_hilang->view_search($name); 
      if(count($viewsearch["orang_hilang"]) > 0){
        $data['model'] = $viewsearch;
        $data['view'] = 'menu/orang_hilang/search';
        $this->load->view('layout/home', $data);
      }else{
        $data['tittle'] = 'oranhilang. | Data Orang Hilang';
        $data['view'] = 'menu/orang_hilang/search_empty';
        $data['model'] = $this->orang_hilang->view_search(''); 
        $this->load->view('layout/home', $data);
      }
    }else{
      $data['tittle'] = 'oranhilang. | Data Orang Hilang';
      $data['view'] = 'menu/orang_hilang/search_empty';
      $data['model'] = $this->orang_hilang->view_search(''); 
      $this->load->view('layout/home', $data);
    }
    
  }

}

/* End of file Oranghilang.php */
/* Location: ./application/controllers/Oranghilang.php */