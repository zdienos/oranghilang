<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_bencana','bencana');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
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
        $data['js_validation'] = 'bencana-form';
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
    $data['js_validation'] = 'bencana-form';
    $data['view'] = 'menu/bencana/add_bencana';
    $data['label'] = array( 
      'jenis_bencana'=>'Jenis Bencana Alam',
      'nama_bencana'=>'Nama Bencana Alam',
      'tgl_waktu'=>'Tanggal Bencana Alam',
      'keterangan'=>'Keterangan',
      'provinces' =>'Provinsi',
      'regencies'=>'Kota/Kabupaten',
      'districts'=>'Kecamatan',
      'villages'=>'Kelurahan/Desa',
    );
    $data['jenis_bencana'] = $this->bencana->getJenisBencanaAlam();
    $data['regencies'] = $this->bencana->getRegencies();
    $data['districts'] = $this->bencana->getDistricts();
    $data['villages'] = $this->bencana->getVillages();
    $data['provinces'] = $this->bencana->getProvinces();
    $this->load->view('layout/home', $data);
  }

  public function validate()
  {
    if ($this->input->server('REQUEST_METHOD') == 'POST'){      
      $this->form_validation->set_rules($this->bencana->rules());        
      $this->form_validation->set_message($this->config->item('msg_error'));      
      if (!$this->form_validation->run()) {
        $data['error'] = true;
        $data['error_msg'] = array(               
          'id_jenis_bencana_alam' => form_error('id_jenis_bencana_alam' ),
          'id_provinces' => form_error('id_provinces'),
          'id_regencies' => form_error('id_regencies'),
          'id_districts' => form_error('id_districts'),
          'id_villages' => form_error('id_villages' ),
          'nama_bencana_alam' => form_error('nama_bencana_alam'),
          'tgl_waktu' => form_error('tgl_waktu' ),
          'keterangan' => form_error('keterangan'),
        );
      }else{                    
          if ($this->bencana->mAddBencana(
          $this->input->post('id_jenis_bencana_alam'),
          $this->input->post('id_provinces'),
          $this->input->post('id_regencies'),
          $this->input->post('id_districts'),
          $this->input->post('id_villages'),
          $this->input->post('nama_bencana_alam'),
          $this->input->post('tgl_waktu'),
          $this->input->post('keterangan')
        )) {
          $data['success']=true;
        }        
      }
      echo json_encode($data);
    }
  }
    public function addBencana(){
      if ($this->input->server('REQUEST_METHOD') == 'POST'){
        if ($this->bencana->mAddBencana(
          $this->input->post('id_jenis_bencana_alam'),
          $this->input->post('id_provinces'),
          $this->input->post('id_regencies'),
          $this->input->post('id_districts'),
          $this->input->post('id_villages'),
          $this->input->post('nama_bencana_alam'),
          $this->input->post('tgl_waktu'),
          $this->input->post('keterangan')
        )) {
          redirect('bencana','refresh');
          $this->session->set_flashdata('name', 'value');
        }

      }
    }

    public function getregencies($id){
      $regency = $this->bencana->getRegenciesById($id);
      foreach($regency as $data){
        echo '<option value="'.$data->id.'">'.$data->name_regencies.'</option>';
      }
    }

    public function getdistricts($id){
      $districts = $this->bencana->getDistrcitsByRegencyId($id);
      foreach($districts as $data){
        echo '<option value="'.$data->id.'">'.$data->name_disctricts.'</option>';
      }
    }

    public function getvillages($id){
      $villages = $this->bencana->getVillagesByDistrictsId($id);
      foreach($villages as $data){
        echo '<option value="'.$data->id.'">'.$data->name_villages.'</option>';
      }
    }
  }

  /* End of file Home.php */
/* Location: ./application/controllers/Home.php */