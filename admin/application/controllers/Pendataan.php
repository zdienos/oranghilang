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
		if($this->session->userdata('user_grup') == 'petugas'){
      $data['view'] = 'menu/pendataan/orang_hilang';
      $data['oranghilang'] = $this->pendataan->getOrangHilang();
      $this->load->view('layout/home',$data);
    }else{
      echo 'nottt';
    }
  }
  
  public function add(){
    $data['view'] = 'menu/pendataan/add_orang_hilang';
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
        $data['error_msg'] = array(               
          'nama_lengkap' => form_error('nama_lengkap'),
          'nama_panggilan' => form_error('nama_panggilan'),
          'alamat' => form_error('alamat'),
          'umur' => form_error('umur'),          
          'id_jenis_kelamin' => form_error('id_jenis_kelamin'),
          'marga_suku' => form_error('marga_suku'),
          'warna_kulit' => form_error('warna_kulit'),
          'celana_terakhir' => form_error('celana_terakhir
            '),
          'id_kategori_umur' => form_error('id_kategori_umur'),
          'foto' => form_error('foto'),
          'lokasi_terakhir' => form_error('lokasi_terakhir'),
          'lat_lokasi' => form_error('lat_lokasi'),
          'lon_lokasi' => form_error('lon_lokasi'),
          'nama_ayah' => form_error('nama_ayah'),
          'nama_ibu' => form_error('nama_ibu'),
          'keterangan_lainnya' => form_error('keterangan_lainnya'),
          'nama_pelapor' => form_error('nama_pelapor'),
          'no_hp_pelapor' => form_error('no_hp_pelapor'),
          'id_bencana_alam' => form_error('id_bencana_alam'),
          'id_hubungan_pelapor' => form_error('id_hubungan_pelapor'),
          'id_status_org_hilang' => form_error('id_status_org_hilang'),
          'tgl_laporan' => form_error('tgl_laporan'),
        );
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
          $this->input->post('id_status_org_hilang'),
          $this->input->post('tgl_laporan')
        )){
          $data['success']=true;
        }        
      }
      echo json_encode($data);
    }
  }

  public function addOrangHilang(){
    if ($this->input->server('REQUEST_METHOD') == 'POST'){
      
    }
  }

}

/* End of file Pendataan.php */
/* Location: ./application/controllers/Pendataan.php */