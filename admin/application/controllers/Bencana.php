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
      if ($this->session->userdata('user_grup') == 'admin' || $this->session->userdata('user_grup') == 'petugas') {
        $data['view'] = 'menu/bencana/bencana';
        $data['bencana'] = $this->bencana->getBencana();
        print_r($this->bencana->getBencana());exit;
        $data['js_validation'] = 'bencana-form';
        $this->load->view('layout/home', $data);
      }else{
       redirect('error/error_403','refresh');
     }      
   }
  else{
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
  $data['label'] = $this->bencana->label();
  $data['jenis_bencana'] = $this->bencana->getJenisBencanaAlam();
  $data['provinces'] = $this->bencana->getProvinces();
  $data['dropdown'] = 'dropdown-bencana';
  $this->load->view('layout/home', $data);
}

public function validate()
{
  if ($this->input->server('REQUEST_METHOD') == 'POST'){      
    $this->form_validation->set_rules($this->bencana->rules());        
    $this->form_validation->set_message($this->config->item('msg_error'));      
    if (!$this->form_validation->run()) {
      $data['error'] = true;
      $data['error_msg'] = $this->bencana->error_msg();
    }else{                    
      if ($this->bencana->mAddBencana(
        $this->input->post('jenis_bencana_alam'),
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