<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bencana extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    if(!$this->session->userdata('login')){
      redirect('error/error_401','refresh');
    }    
    if (strcasecmp($this->session->userdata('user_grup'),'writer') == 0) {
      redirect('error/error_403','refresh');      
    }
    $this->load->model('M_bencana','bencana');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
    $this->load->library('datatables');
  }

  public function index()
  {   
  $data['view'] = 'menu/bencana/bencana';
  $data['bencana'] = $this->bencana->getBencana();
  $data['js_validation'] = '';
  $data['datatablescss'] = 'css';
  $data['datatables'] = 'datatables-bencana';
  $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
  $this->load->view('layout/home', $data);
}

public function json(){
  if($this->input->server('REQUEST_METHOD') == 'POST'){
    header('Content-Type: application/json');
    echo $this->bencana->json();
  }else{
    echo 'Method not allowed!';
  }
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
        $this->input->post('jenis_bencana_alam',TRUE),
        $this->input->post('id_provinces',TRUE),
        $this->input->post('id_regencies',TRUE),
        $this->input->post('id_districts',TRUE),
        $this->input->post('id_villages',TRUE),
        $this->input->post('nama_bencana_alam',TRUE),
        $this->input->post('tgl_waktu',TRUE),
        $this->input->post('keterangan',TRUE)
      )) {
        $data['success']=true;
      }        
    }
    echo json_encode($data);
  }
}

public function detail($id){

    $bencana = $this->bencana->getBencanaById($id);
    $data['js_validation'] = 'bencana-form';
    $data['view'] = 'menu/bencana/detail';
    $data['label'] = $this->bencana->label();
    $data['detail'] = $bencana;
    $data['notselectedprovince'] = $this->bencana->getNotSelectedProvince($bencana->proid);
    $data['jenisbencana'] = $this->bencana->getJenisBencanaAlam();
    $data['notselectedjenisbencana'] = $this->bencana->getNotSelectedJenisBencana($bencana->jbaaid);
    $data['dropdown'] = 'dropdown-bencana';
    $this->load->view('layout/home', $data);

}

public function edit($id){

    $data['js_validation'] = 'bencana-form';
    $bencana = $this->bencana->getBencanaById($id);
    $data['view'] = 'menu/bencana/edit';
    $data['label'] = $this->bencana->label();
    $data['detail'] = $bencana;
    $data['notselectedprovince'] = $this->bencana->getNotSelectedProvince($bencana->proid);
    $data['jenisbencana'] = $this->bencana->getJenisBencanaAlam();
    $data['notselectedjenisbencana'] = $this->bencana->getNotSelectedJenisBencana($bencana->jbaaid);
    $data['dropdown'] = 'validation/dropdown-bencana-edit';
    $this->load->view('layout/home', $data);
  
}

public function update($id){
  if ($this->input->server('REQUEST_METHOD') == 'POST'){      
    $this->form_validation->set_rules($this->bencana->rules_edit());        
    $this->form_validation->set_message($this->config->item('msg_error'));      
    if (!$this->form_validation->run()) {
      $data['error'] = true;
      $data['error_msg'] = $this->bencana->error_msg_edit();
    }else{                    
      if($this->bencana->updateBencana(
        $id,
        $this->input->post('jenis_bencana_alam',TRUE),
        $this->input->post('nama_bencana_alam',TRUE),
        $this->input->post('tgl_waktu',TRUE),
        $this->input->post('keterangan',TRUE),
        $this->input->post('id_provinces',TRUE),
        $this->input->post('id_regencies',TRUE),
        $this->input->post('id_districts',TRUE),
        $this->input->post('id_villages',TRUE)
      )){
        $data['success']=true;
      }
    }
    echo json_encode($data);
  }
}

public function delete($id){
  if($this->input->server('REQUEST_METHOD') == 'POST'){
    $this->bencana->deleteBencana($id);
    redirect('bencana','refresh');
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