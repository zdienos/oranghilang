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
          $data['view'] = 'menu/bencana';
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
    $table = '';
    $primaryKey = 'id';

    $columns = array(
      array('db' => 'id', 'dt' => 0),
      array('db' => 'nama_jenis_bencana_alam', 'dt' => 1),
      array('db' => 'name_provinces', 'dt' => 2),
      array('db' => 'name_regencies', 'dt' => 3),
      array('db' => 'name_districts', 'dt' => 4),
      array('db' => 'name_villages', 'dt' => 5),
      array('db' => 'nama_bencana_alam', 'dt' => 6),
      array('db' => 'tgl_waktu', 'dt' => 7),
    );

    echo json_encode(
      SSP::simple( $_GET, $db, $table, $primaryKey, $columns )
  );
  }
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */