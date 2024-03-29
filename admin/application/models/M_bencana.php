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

  public function __construct() {
    parent::__construct();
  }
  
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
      
      ['field' => 'jenis_bencana_alam',
      'label' => 'Jenis Bencana Alam',
      'rules' => 'required']
    ];
  }

  public function rules_edit()
  {
    return [
      ['field' => 'nama_bencana_alam',
      'label' => 'Nama Bencana Alam',
      'rules' => 'trim|required'] 
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
      'tgl_waktu' => form_error('tgl_waktu')
    );
  }

  public function error_msg_edit(){
    return array(               
      'nama_bencana_alam' => form_error('nama_bencana_alam')
    );
  }

  public function json(){
    return $this->datatables->select('bencana_alam.id as ID, jenis_bencana_alam.nama_jenis_bencana_alam as Jenis,provinces.name_provinces as Provinsi,regencies.name_regencies as Kabupaten,districts.name_disctricts as Kecamatan,villages.name_villages as Desa,nama_bencana_alam as Bencana,tgl_waktu as Tanggal, keterangan as Keterangan')
                            ->join('provinces','bencana_alam.id_provinces=provinces.id')
                            ->join('regencies','bencana_alam.id_regencies=regencies.id')
                            ->join('districts','bencana_alam.id_districts=districts.id')
                            ->join('villages','bencana_alam.id_villages=villages.id')
                            ->join('jenis_bencana_alam','bencana_alam.id_jenis_bencana_alam=jenis_bencana_alam.id')
                            ->from('bencana_alam')
                            ->add_column('aksi','
                              <form action="'.base_url('bencana/detail/$1').'" method="post">
                                <button type="submit" class="btn cur-p btn-success ti-eye"></button>
                              </form>
                              <form action="'.base_url('bencana/edit/$1').'" method="post">
                                <button onclick="delete()" type="submit" class="btn cur-p btn-primary ti-pencil"></button>
                              </form>
                              <form action="'.base_url('bencana/delete/$1').'" method="post">
                                <button id="btnDelete" onclick="delete()" type="submit" class="btn cur-p btn-danger ti-trash"></button>
                              </form>',
                              'ID')
                            ->generate();
  }

  public function getBencana(){
    return $this->db->select('bencana_alam.id,jenis_bencana_alam.nama_jenis_bencana_alam,provinces.name_provinces,regencies.name_regencies,districts.name_disctricts,villages.name_villages,nama_bencana_alam,tgl_waktu,keterangan')
                    ->join('jenis_bencana_alam','bencana_alam.id_jenis_bencana_alam=jenis_bencana_alam.id')
                    ->join('provinces','bencana_alam.id_provinces=provinces.id')
                    ->join('regencies','bencana_alam.id_regencies=regencies.id')
                    ->join('districts','bencana_alam.id_districts=districts.id')
                    ->join('villages','bencana_alam.id_villages=villages.id')
                    ->get('bencana_alam')
                    ->result();
  }

  public function getBencanaById($id){
    return $this->db->select('bencana_alam.id AS bid,jenis_bencana_alam.id AS jbaaid,nama_jenis_bencana_alam,nama_bencana_alam,tgl_waktu,keterangan,provinces.id AS proid,name_provinces,villages.id AS vid, name_villages,regencies.id AS rid,name_regencies,districts.id AS did,name_disctricts')
                    ->where('bencana_alam.id',$id)
                    ->join('provinces','bencana_alam.id_provinces=provinces.id')
                    ->join('regencies','bencana_alam.id_regencies=regencies.id')
                    ->join('districts','bencana_alam.id_districts=districts.id')
                    ->join('villages','bencana_alam.id_villages=villages.id')
                    ->join('jenis_bencana_alam','jenis_bencana_alam.id=bencana_alam.id_jenis_bencana_alam')
                    ->get('bencana_alam')
                    ->row();
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

  public function getNotSelectedProvince($id){
    return $this->db->where('id !=',$id)->get('provinces')->result();
  }

  public function getNotSelectedJenisBencana($id){
    return $this->db->where('id !=',$id)->get('jenis_bencana_alam')->result();
  }

  public function updateBencana($id,$jenis_bencana_alam,$nama_bencana_alam,$tgl_waktu,$keterangan,$id_provinces,$id_regencies,$id_districts,$id_villages){
    $array = array(
      'id_jenis_bencana_alam' => $jenis_bencana_alam,
      'id_provinces' => $id_provinces,
      'id_regencies' => $id_regencies,
      'id_districts' => $id_districts,
      'id_villages' => $id_villages,
      'nama_bencana_alam' => $nama_bencana_alam,
      'tgl_waktu' => $tgl_waktu,
      'keterangan' => $keterangan
    );
    return $this->db->where('id',$id)->update('bencana_alam',$array);
  }

  public function deleteBencana($id){
    return $this->db->delete('bencana_alam',array('id' => $id));
  }

  public function checkOrangIlangById($id)
  {
    return $this->db->select('id')->where('id_bencana_alam',$id)->get('orang_hilang')->num_rows();
  }

  public function getBencanaAlam()
  {
    return $this->db->query("SELECT DISTINCT bencana_alam.id as id,nama_bencana_alam from bencana_alam RIGHT JOIN orang_hilang on orang_hilang.id_bencana_alam = bencana_alam.id")->result();
  }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */