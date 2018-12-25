<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bencana extends CI_Model {

	private $_table = "bencana_alam";

	public $id;
	public $name;
	public $email;
	public $password;
	public $remember_token;
	public $created_at;
	public $updated_at;

  public function rules()
  {
    return [
      ['field' => 'id_provinces',
      'label' => 'Provinsi',
      'rules' => 'required'],

      ['field' => 'id_regencies',
      'label' => 'Kota/Kabupaten',
      'rules' => 'required'],

      ['field' => 'id_districts',
      'label' => 'Kecamatan',
      'rules' => 'required'],

      ['field' => 'id_villages',
      'label' => 'Desa',
      'rules' => 'required'],

      ['field' => 'nama_bencana_alam',
      'label' => 'Nama Bencana Alam',
      'rules' => 'trim|required'],

      ['field' => 'tgl_waktu',
      'label' => 'Tanggal Bencana Alam',
      'rules' => 'required'],

      ['field' => 'keterangan',
      'label' => 'Keterangan',
      'rules' => ''], 
      
      ['field' => 'jenis_bencana_alam',
      'label' => 'Jenis Bencana Alam',
      'rules' => 'required']
    ];
  }
  
  public function label()
  {
    return array(
      'jenis_bencana'=>'Jenis Bencana Alam',
      'nama_bencana'=>'Nama Bencana Alam',
      'tgl_waktu'=>'Tanggal Bencana Alam',
      'keterangan'=>'Keterangan',
      'provinces' =>'Provinsi',
      'regencies'=>'Kota/Kabupaten',
      'districts'=>'Kecamatan',
      'villages'=>'Kelurahan/Desa',
    );
  }

  public function error_msg()
  {
    return array(               
      'jenis_bencana_alam' => form_error('jenis_bencana_alam'),
      'id_provinces' => form_error('id_provinces'),
      'id_regencies' => form_error('id_regencies'),
      'id_districts' => form_error('id_districts'),
      'id_villages' => form_error('id_villages' ),
      'nama_bencana_alam' => form_error('nama_bencana_alam'),
      'tgl_waktu' => form_error('tgl_waktu' ),
      'keterangan' => form_error('keterangan'),
    );
  }

  public function getBencana(){
    return $this->db->join('jenis_bencana_alam','bencana_alam.id_jenis_bencana_alam=jenis_bencana_alam.id')
    ->join('provinces','bencana_alam.id_provinces=provinces.id')
    ->join('regencies','bencana_alam.id_regencies=regencies.id')
    ->join('districts','bencana_alam.id_districts=districts.id')
    ->join('villages','bencana_alam.id_villages=villages.id')
    ->select('bencana_alam.id,jenis_bencana_alam.nama_jenis_bencana_alam,provinces.name_provinces,regencies.name_regencies,districts.name_disctricts,villages.name_villages,nama_bencana_alam,tgl_waktu,keterangan')
    ->get('bencana_alam')
    ->result();
  }

  public function getJenisBencanaAlam(){
    return $this->db->select('id,nama_jenis_bencana_alam')->get('jenis_bencana_alam')->result();
  }

  public function getProvinces(){
    return $this->db->select('id,name_provinces')->order_by('name_provinces','ASC')->get('provinces')->result();
  }

  public function mAddBencana($jenis_bencana,$provices,$regency,$district,$villages,$nama_bencana,$date,$keterangan){
    $array = array(
      'id' => '',
      'id_jenis_bencana_alam' => $jenis_bencana,
      'id_provinces' => $provices,
      'id_regencies' => $regency,
      'id_districts' => $district,
      'id_villages' => $villages,
      'nama_bencana_alam' => $nama_bencana,
      'tgl_waktu' => $date,
      'keterangan' => $keterangan
    );  
    return $this->db->insert('bencana_alam',$array);
  }

  public function getRegenciesById($id){
    return $this->db->where('province_id',$id)->select('id,name_regencies')->order_by('name_regencies','ASC')->get('regencies')->result();
  }

  public function getDistrcitsByRegencyId($id){
    return $this->db->where('regency_id',$id)->select('id,name_disctricts')->order_by('name_disctricts','ASC')->get('districts')->result();
  }

  public function getVillagesByDistrictsId($id){
    return $this->db->where('district_id',$id)->select('id,name_villages')->order_by('name_villages','ASC')->get('villages')->result();
  }
  public function getIdBencana(){
    return $this->db->select('id,nama_bencana_alam')->get('bencana_alam')->result();
  }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */