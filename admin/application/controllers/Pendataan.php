<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends CI_Controller {

  public function __construct()
	{
		parent::__construct();
    $this->load->model('M_pendataan','pendataan');
    $this->load->model('M_bencana','bencana');
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('', '');
	}

	public function index()
	{
    if ($this->session->userdata('login')) {
      if($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'){
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(1);
      $data['captoranghilang'] = 'Data Orang Hilang Proses Pencarian';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $this->load->view('layout/home',$data);
      }else{
        redirect('error/error_403','refresh');
      }
    }else{
      redirect('error/error_401','refresh');
    }
		
  }
  
  public function add(){
    $data['view'] = 'menu/pendataan/add_orang_hilang';
    $data['label'] = $this->pendataan->label();
    $data['gender'] =$this->pendataan->getGender();
    $data['kategoriumur'] =$this->pendataan->getKategoriUmur();
    $data['hubunganpelapor'] =$this->pendataan->getHubunganPelapor();
    $data['bencanaalam'] = $this->bencana->getIdBencana();
    $data['statusorg'] = $this->pendataan->getStatus();
    $data['js_validation'] = 'orang-hilang';
    $this->load->view('layout/home',$data);
  }

  public function validate(){
    if($this->input->server('REQUEST_METHOD') == 'POST'){      
      $this->form_validation->set_rules($this->pendataan->rules());        
      $this->form_validation->set_message($this->config->item('msg_error'));      
      if (!$this->form_validation->run()) {
        $data['error'] = true;
        $data['error_msg'] = $this->pendataan->error_msg();
      }else{                    
        if($this->pendataan->mAddOrangHilang(
          $this->input->post('nama_lengkap'),
          $this->input->post('nama_panggilan'),
          $this->input->post('alamat'),
          $this->input->post('umur'),
          $this->input->post('id_jenis_kelamin'),
          $this->input->post('marga_suku'),
          $this->input->post('warna_kulit'),
          $this->input->post('baju_terakhir'),
          $this->input->post('celana_terakhir'),
          $this->input->post('id_kategori_umur'),
          $this->input->post('foto'),
          $this->input->post('lokasi_terakhir'),
          $this->input->post('lat_lokasi'),
          $this->input->post('lon_lokasi'),
          $this->input->post('nama_ayah'),
          $this->input->post('nama_ibu'),
          $this->input->post('keterangan_lainnya'),
          $this->input->post('nama_pelapor'),
          $this->input->post('no_hp_pelapor'),
          $this->input->post('id_bencana_alam'),
          $this->input->post('id_hubungan_pelapor'),
          $this->input->post('id_status_org_hilang')          
        )){
          $data['success']=true;
        }        
      }
      echo json_encode($data);
    }
  }

  public function ditemukanhidup(){
    if ($this->session->userdata('login')) {
      if($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'){
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(2);
      $data['captoranghilang'] = 'Data Orang Hilang Ditemukan Hidup';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $this->load->view('layout/home',$data);
      }else{
        redirect('error/error_403','refresh');
      }
    }else{
      redirect('error/error_401','refresh');
    }
  }

  public function ditemukanmeninggal(){
    if ($this->session->userdata('login')) {
      if($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'){
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(3);
      $data['captoranghilang'] = 'Data Orang Hilang Ditemukan Meninggal';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $this->load->view('layout/home',$data);
      }else{
        redirect('error/error_403','refresh');
      }
    }else{
      redirect('error/error_401','refresh');
    }
  }

  public function tidakditemukan(){
    if ($this->session->userdata('login')) {
      if($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'){
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(4);
      $data['captoranghilang'] = 'Data Orang Hilang Tidak Ditemukan';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $this->load->view('layout/home',$data);
      }else{
        redirect('error/error_403','refresh');
      }
    }else{
      redirect('error/error_401','refresh');
    }
  }

  public function edit($id){
    if($this->input->server('REQUEST_METHOD') == "POST"){
      $oranghilang = $this->pendataan->getOrangHilangById($id);
      $data['edit'] = $oranghilang;
      $data['jenkel'] = $oranghilang->id_jenis_kelamin;
      $data['label'] = $this->pendataan->label();
      $data['js_validation']='orang-hilang';
      $data['selectedjenkel'] = $this->pendataan->getSelectedJenkel($oranghilang->id_jenis_kelamin);
      $data['notselectedjenkel'] = $this->pendataan->getNotSelectedJenkel($oranghilang->id_jenis_kelamin);
      $data['selectedkategoriumur'] = $this->pendataan->getSelectedKategoriUmur($oranghilang->id_kategori_umur);
      $data['notselectedkategoriumur'] = $this->pendataan->getNotSelectedKategoriUmur($oranghilang->id_kategori_umur);
      $data['selectedhubunganpelapor'] = $this->pendataan->getSelectedHubunganPelapor($oranghilang->id_hubungan_pelapor);
      $data['notselectedhubunganpelapor'] = $this->pendataan->getNotSelectedHubunganPelapor($oranghilang->id_hubungan_pelapor);
      $data['selectedbencanaalam'] = $this->pendataan->getSelectedBencanaAlam($oranghilang->id_bencana_alam);
      $data['notselectedbencanaalam'] = $this->pendataan->getNotSelectedBencanaAlam($oranghilang->id_bencana_alam);
      $data['selectedstatus'] = $this->pendataan->getSelectedStatus($oranghilang->id_status_org_hilang);
      $data['notselectedstatus'] = $this->pendataan->getNotSelectedStatus($oranghilang->id_status_org_hilang);
      
      $data['view'] = 'menu/pendataan/edit_orang_hilang';
      $this->load->view('layout/home',$data);
    }else{
      echo 'method not aallowerd';
    }
  }

  public function editt(){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
       $this->form_validation->set_rules($this->pendataan->rules());        
      $this->form_validation->set_message($this->config->item('msg_error'));      
      if (!$this->form_validation->run()) {
        $data['error'] = true;
        $data['error_msg'] = $this->pendataan->error_msg();
      }else{     
        if ($this->pendataan->mEditOrangHilang(
        $this->input->post('id'),
        $this->input->post('nama_lengkap'),
          $this->input->post('nama_panggilan'),
          $this->input->post('alamat'),
          $this->input->post('umur'),
          $this->input->post('id_jenis_kelamin'),
          $this->input->post('marga_suku'),
          $this->input->post('warna_kulit'),
          $this->input->post('baju_terakhir'),
          $this->input->post('celana_terakhir'),
          $this->input->post('id_kategori_umur'),
          $this->input->post('foto'),
          $this->input->post('lokasi_terakhir'),
          $this->input->post('lat_lokasi'),
          $this->input->post('lon_lokasi'),
          $this->input->post('nama_ayah'),
          $this->input->post('nama_ibu'),
          $this->input->post('keterangan_lainnya'),
          $this->input->post('nama_pelapor'),
          $this->input->post('no_hp_pelapor'),
          $this->input->post('id_bencana_alam'),
          $this->input->post('id_hubungan_pelapor'),
          $this->input->post('id_status_org_hilang')
      )
        ) {
          $data['success']=true;
        }
      }
    }else{
      echo 'Method not allowed!';
    }
    echo json_encode($data);
  }

  public function delete($id){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      echo json_encode($this->pendataan->deleteOrangHilang($id));
    }else{
      echo 'Method not allowed!';
    }
  }
}

/* End of file Pendataan.php */
/* Location: ./application/controllers/Pendataan.php */