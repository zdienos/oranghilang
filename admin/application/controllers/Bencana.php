<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
		$this->load->model('M_bencana','bencana');
	}

	public function index()
	{		
		if($this->session->userdata('login')){
      switch($this->session->userdata('user_grup')){
        case 'admin':
          redirect('error/error_403','refresh');
          break;
        case 'petugas':
          $data['view'] = 'menu/bencana/bencana';
          $data['bencana'] = $this->bencana->getBencana();
          $this->load->view('layout/home', $data);
          break;
        case 'writer':
          redirect('error/error_403','refresh');
          break;
      }
    }else{
      redirect('error/error_401','refresh');
    }
  }
  
  public function dataTableServerRender(){

    $this->load->library('ssp');
    $db = array(
      'host' => 'localhost',
      'user' => 'root',
      'pass' => '',
      'database' => 'db_stiki'
    );
    $table = 'bencana_alam';
    $primaryKey = 'id';

    $columns = array(
      array('db' => 'id', 'dt' => 1),
      array('db' => 'jenis_bencana_alam.nama_jenis_bencana_alam', 'dt' => 2),
      array('db' => 'name_provinces', 'dt' => 3),
      array('db' => 'name_regencies', 'dt' => 4),
      array('db' => 'name_districts', 'dt' => 5),
      array('db' => 'name_villages', 'dt' => 6),
      array('db' => 'nama_bencana_alam', 'dt' => 7),
      array('db' => 'tgl_waktu', 'dt' => 8),
    );

    echo json_encode(
      SSP::simple( $_GET, $db, $table, $primaryKey, $columns )
  );
  }

  public function add(){
    $data['view'] = 'menu/bencana/add_bencana';
    $data['jenis_bencana'] = $this->bencana->getJenisBencanaAlam();
    $data['regencies'] = $this->bencana->getRegencies();
    $data['districts'] = $this->bencana->getDistricts();
    $data['villages'] = $this->bencana->getVillages();
    $data['provinces'] = $this->bencana->getProvinces();
    $this->load->view('layout/home', $data);
  }

  public function addBencana(){
    echo $this->bencana->mAddBencana($this->input->post('id_jenis_bencana_alam'),$this->input->post('id_provinces'),$this->input->post('id_regencies'),$this->input->post('id_districts'),$this->input->post('id_villages'),$this->input->post('nama_bencana_alam'),$this->input->post('tgl_waktu'),$this->input->post('keterangan'));
  }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */