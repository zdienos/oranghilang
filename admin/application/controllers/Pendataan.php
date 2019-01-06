<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendataan extends CI_Controller {

  public function __construct()
	{
    parent::__construct();
    if(!$this->session->userdata('login')){
      redirect('error/error_401','refresh');
    }    
    if (strcasecmp($this->session->userdata('user_grup'),'writer') == 0) {
      redirect('error/error_403','refresh');      
    }
    $this->load->model('M_pendataan','pendataan');
    $this->load->model('M_bencana','bencana');
    $this->load->library('form_validation');
    $this->load->library('datatables');
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
      $data['captoranghilang'] = 'Daftar Orang Hilang Proses Pencarian';
      $data['datatablescss'] = 'css';
      $data['datatables'] = 'datatables-orang';
      $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
      $data['id'] = 1;
      $data['title'] = 'oranghilang. | Daftar Orang Hilang Proses Pencarian';
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
    $data['js'] = 'pendataan';
    $data['js2'] = 'pendataan-extra';
    $data['gender'] =$this->pendataan->getGender();
    $data['kategoriumur'] =$this->pendataan->getKategoriUmur();
    $data['hubunganpelapor'] =$this->pendataan->getHubunganPelapor();
    $data['bencanaalam'] = $this->bencana->getIdBencana();
    $data['statusorg'] = $this->pendataan->getStatus();
    $data['js_validation'] = 'orang-hilang';
    $data['title'] = 'oranghilang. | Tambah Data Orang Hilang';
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
        $foto='' ;        
        if ($this->input->post('foto')=='Klik Untuk Upload') {
          $foto = '';
        }else{
          $nama =$this->input->post('nama_lengkap');
          $tanggal = $this->input->post('nama_lengkap');
          $this->load->library('upload');
          $config['upload_path'] = './assets/orang_hilang/foto';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']  = '2048';
          if (isset($_FILES["foto"]["name"])) {
            $config['file_name']  = $nama."_".md5($tanggal);
            $this->upload->initialize($config); 
            if ( ! $this->upload->do_upload('foto')){
              $data['error'] = true;
              $data['wrong_msg'] = $this->upload->display_errors();
            } else{
              $foto = $this->upload->data('file_name');
              $data['mm']=$foto;
            }
          }
        }        
        $this->pendataan->mAddOrangHilang(
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
          $foto,
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
        );
          $data['success']=true;
          $redirect = array(
            '1' => '',
            '2' => 'ditemukanhidup',
            '3' => 'ditemukanmeninggal',
            '4' => 'tidakditemukan'
          );
          $data['redirect'] = $redirect[$this->input->post('id_status_org_hilang')];
    }
    echo json_encode($data);
  }
}

  public function ditemukanhidup(){
    if ($this->session->userdata('login')) {
      if($this->session->userdata('user_grup') == 'petugas' || $this->session->userdata('user_grup') == 'admin'){
      $data['id'] = 2;
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(2);
      $data['captoranghilang'] = 'Daftar Orang Hilang Ditemukan Hidup';
      $data['datatables'] = 'datatables-orang';
      $data['datatablescss'] = 'css';
      $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $data['title'] = 'oranghilang. | Daftar Orang Hilang Ditemukan Hidup';
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
      $data['id'] = 3;  
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(3);
      $data['captoranghilang'] = 'Daftar Orang Hilang Ditemukan Meninggal';
      $data['datatables'] = 'datatables-orang';
      $data['datatablescss'] = 'css';
      $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $data['title'] = 'oranghilang. | Daftar Orang Hilang Ditemukan Meninggal';
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
      $data['id'] = 4;
      $data['active'] = 'blue';
      $data['js_validation']='';
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang(4);
      $data['captoranghilang'] = 'Daftar Orang Hilang Tidak Ditemukan';
      $data['datatables'] = 'datatables-orang';
      $data['datatablescss'] = 'css';
      $data['deleteItem'] = '<script src="'.base_url("assets/js/delete-item.js").'"></script>';
      $data['jenkel'] = array(
        'Laki-Laki' => 'L',
        'Perempuan' => 'P'
      );
      $data['title'] = 'oranghilang. | Tidak Ditemukan';
      $this->load->view('layout/home',$data);
      }else{
        redirect('error/error_403','refresh');
      }
    }else{
      redirect('error/error_401','refresh');
    }
  }

  public function detail($id){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      $data['detail'] = $this->pendataan->getDetailOrangHilang($id);
      $data['label'] = $this->pendataan->label();
      $data['js_validation']='';
      $data['title'] = 'oranghilang. | Detail Orang Hilang';      
      $data['view'] = 'menu/pendataan/detail';
      $this->load->view('layout/home',$data);
    }
  }

  public function edit($id){
    if($this->input->server('REQUEST_METHOD') == "POST"){
      $oranghilang = $this->pendataan->getOrangHilangById($id);
      $data['edit'] = $oranghilang;
      $data['js'] = 'pendataan';
      $data['js2'] = 'pendataan-extra';
      $data['title'] = 'oranghilang. | Edit Data Orang Hilang';
      $data['jenkel'] = $oranghilang->id_jenis_kelamin;
      $data['label'] = $this->pendataan->label();
      $data['js_validation'] = 'orang-hilang';
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
      $data['datatablescss'] = '';
      $data['datatables'] = '';
      $data['view'] = 'menu/pendataan/edit_orang_hilang';
      $this->load->view('layout/home',$data);
    }else{
      echo 'method not aallowerd';
    }
  }

  public function update($id){
    if($this->input->server('REQUEST_METHOD') == 'POST'){      
      $this->form_validation->set_rules($this->pendataan->rules());        
      $this->form_validation->set_message($this->config->item('msg_error'));      
      if (!$this->form_validation->run()) {
        $data['error'] = true;
        $data['error_msg'] = $this->pendataan->error_msg();
      }else{                    
        if ($this->input->post('foto')=='hapus') {          
          $foto = '';
          $cek = 'oke';
        }
        $nama =$this->input->post('nama_lengkap');
          $tanggal = date("Y_m_d H:i:s");
          $this->load->library('upload');
          $config['upload_path'] = './assets/orang_hilang/foto';
          $config['allowed_types'] = 'jpg|png|jpeg';
          $config['max_size']  = '2048';
          $foto = '';
        if (isset($_FILES["foto"]["name"])) {
            $config['file_name']  = $nama."_".md5($tanggal);
            $this->upload->initialize($config); 
            if ( ! $this->upload->do_upload('foto')){
              $data['error'] = true;
              $data['wrong_msg'] = $this->upload->display_errors();
              $cek = 'gak';
            } else{
              $foto = $this->upload->data('file_name');
              $data['foto'] = $foto;
              $cek = 'oke';              
            }
        }else{
          $foto = $this->pendataan->getFotoById($id)->foto;
          $cek = 'oke';
        }
        if ($cek == 'oke') {
         if($this->pendataan->mEditOrangHilang(
          $id,
          $this->input->post('nama_lengkap',TRUE),
          $this->input->post('nama_panggilan',TRUE),
          $this->input->post('alamat',TRUE),
          $this->input->post('umur',TRUE),
          $this->input->post('id_jenis_kelamin',TRUE),
          $this->input->post('marga_suku',TRUE),
          $this->input->post('warna_kulit',TRUE),
          $this->input->post('baju_terakhir',TRUE),
          $this->input->post('celana_terakhir',TRUE),
          $this->input->post('id_kategori_umur',TRUE),
          $foto,
          $this->input->post('lokasi_terakhir',TRUE),
          $this->input->post('lat_lokasi',TRUE),
          $this->input->post('lon_lokasi',TRUE),
          $this->input->post('nama_ayah',TRUE),
          $this->input->post('nama_ibu',TRUE),
          $this->input->post('keterangan_lainnya',TRUE),
          $this->input->post('nama_pelapor',TRUE),
          $this->input->post('no_hp_pelapor',TRUE),
          $this->input->post('id_bencana_alam',TRUE),
          $this->input->post('id_hubungan_pelapor',TRUE),
          $this->input->post('id_status_org_hilang',TRUE)          
        )){
          $data['success']=true;
          $redirect = array(
            '1' => '',
            '2' => 'ditemukanhidup',
            '3' => 'ditemukanmeninggal',
            '4' => 'tidakditemukan'
          );
          $data['redirect'] = $redirect[$this->input->post('id_status_org_hilang')];
        } 
        }
      }
      echo json_encode($data);
    }
  }

  public function delete($id){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      $this->pendataan->deleteOrangHilang($id);
      redirect('pendataan/'.$this->session->userdata('redirect'),'refresh');
    }else{
      echo 'Method not allowed!';
    }
  }

  public function json($id){
    if($this->input->server('REQUEST_METHOD') == 'POST'){
      header('Content-Type: application/json');
      echo $this->pendataan->json($id);
    }else{
      echo 'Method not allowed!';
    }
  }
}

/* End of file Pendataan.php */
/* Location: ./application/controllers/Pendataan.php */