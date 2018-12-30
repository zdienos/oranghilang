<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendataan extends CI_Model {

	private $_table = "orang_hilang";

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

  public function rules(){
    return [           
      ['field' => 'nama_lengkap',
      'label' => 'Nama Lengkap',
      'rules' => 'trim|required|min_length[4]'],

      ['field' => 'id_jenis_kelamin',
      'label' => 'Jenis Kelamin',
      'rules' => 'trim|required'],

       ['field' => 'umur',
      'label' => 'Umur',
      'rules' => 'trim|required'],

      ['field' => 'id_kategori_umur',
      'label' => 'Kategori Umur',
      'rules' => 'required'],

      [
        'field' => 'nama_pelapor',
        'label' => 'Nama Pelapor',
        'rules' => 'trim|required'],

        ['field' => 'id_bencana_alam',
        'label' => 'Bencana Alam',
        'rules' => 'required'],

        ['field' => 'id_hubungan_pelapor',
        'label' => 'Hubungan Pelapor',
        'rules' => 'trim|required'],

        [
          'field' => 'id_status_org_hilang',
          'label' => 'Status',
          'rules' => 'required'],

        ];
      }

      public function label()
      {
        return array(
          'nama_lengkap' => 'Nama Lengap',
          'nama_panggilan' => 'Nama Panggilan',
          'alamat' => 'Alamat',
          'umur' => 'Umur',
          'id_jenis_kelamin' => 'Pilih Jenis Kelamin',
          'marga_suku' => 'Marga / Suku',
          'warna_kulit' => 'Warna Kulit',
          'baju_terakhir' => 'Baju Terakhir',
          'celana_terakhir' => 'Celana Terakhir',            
          'id_kategori_umur' => 'Pilih Kategori Umur',
          'foto' => 'Foto',
          'lokasi_terakhir' => 'Lokasi Terakhir',
          'lat_lokasi' => 'Latitude Lokasi',
          'lon_lokasi' => 'Longtitude Lokasi',
          'nama_ayah' => 'Nama Ayah',
          'nama_ibu' => 'Nama Ibu',
          'keterangan_lainnya' => 'Keterangan Lainnya',
          'nama_pelapor' => 'Nama Pelapor',
          'no_hp_pelapor' => 'No HP Pelapor',
          'id_bencana_alam' => 'Pilih Bencana Alam',
          'id_hubungan_pelapor' => 'Pilih Hubungan dengan pelapor',
          'id_status_org_hilang' => 'Pilih Status Orang',          
        );
      }

      public function error_msg()
      {
        return array(               
          'nama_lengkap' => form_error('nama_lengkap'),
          'nama_panggilan' => form_error('nama_panggilan'),
          'alamat' => form_error('alamat'),
          'umur' => form_error('umur'),          
          'id_jenis_kelamin' => form_error('id_jenis_kelamin'),
          'marga_suku' => form_error('marga_suku'),
          'warna_kulit' => form_error('warna_kulit'),
          'baju_terakhir' => form_error('baju_terakhir
            '),
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
        );
      }

      public function getOrangHilang($id_status){
        return $this->db->select('orang_hilang.id,nama_bencana_alam,lokasi_terakhir,nama_lengkap,nama_panggilan,nama_jenis_kelamin,umur,alamat,nama_status_org,keterangan_lainnya')
                        ->where('id_status_org_hilang',$id_status)
                        ->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')
                        ->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')
                        ->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')
                        ->get('orang_hilang')
                        ->result();
      }

      public function getDetailOrangHilang($id){
        return $this->db->where('orang_hilang.id',$id)
                        ->select('nama_lengkap,nama_panggilan,alamat,umur,jenis_kelamin.nama_jenis_kelamin,marga_suku,warna_kulit,baju_terakhir,celana_terakhir,kategori_umur.nama_kategori_umur,foto,lokasi_terakhir,lat_lokasi,lon_lokasi,nama_ayah,nama_ibu,keterangan_lainnya,nama_pelapor,no_hp_pelapor,bencana_alam.nama_bencana_alam,hubungan_pelapor.nama_hubungan_pelapor,status_org_hilang.nama_status_org,tgl_laporan,tkp_korban,status_korban,nama_status_org,nama_bencana_alam,tgl_waktu,keterangan,nama_jenis_kelamin')
                        ->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')
                        ->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')
                        ->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')
                        ->join('kategori_umur','kategori_umur.id=orang_hilang.id_kategori_umur')
                        ->join('hubungan_pelapor','hubungan_pelapor.id=orang_hilang.id_hubungan_pelapor')
                        ->get('orang_hilang')
                        ->row();
      }

      public function json($id){
        $jenkel = array(
          'Laki-Laki' => 'L',
          'Perempuan' => 'P'
        );
        return $this->datatables->select('orang_hilang.id,nama_lengkap,nama_panggilan,tgl_laporan,nama_bencana_alam,jenis_kelamin.nama_jenis_kelamin,umur,alamat')
                                ->where('id_status_org_hilang',$id)
                                ->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')
                                ->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')
                                ->from('orang_hilang')
                                ->add_column('name','$1 / $2','nama_lengkap,nama_panggilan')
                                ->add_column('jenage','$1 / $2 Tahun','nama_jenis_kelamin,umur')
                                ->add_column('aksi','
                                  <form action="'.base_url('pendataan/detail/$1').'" method="post">
                                    <button type="submit" class="btn cur-p btn-success ti-eye"></button>
                                  </form>
                                  <form action="'.base_url('pendataan/edit/$1').'" method="post">
                                    <button type="submit" class="btn cur-p btn-primary ti-pencil"></button>
                                  </form>
                                  <form action="'.base_url('pendataan/delete/$1').'" method="post">
                                  <button type="submit" class="btn cur-p btn-danger ti-trash" onclick="return confirm(Are you sure to delete this item ?)"></button>
                                  </form>',
                                  'id')
                                ->generate();
      }

      public function getSelectedJenkel($id){
        return $this->db->where('id',$id)->get('jenis_kelamin')->row();
      }

      public function getNotSelectedJenkel($id){
        return $this->db->where('id !=',$id)->get('jenis_kelamin')->result();
      }

      public function getSelectedKategoriUmur($id){
        return $this->db->where('id',$id)->get('kategori_umur')->row();
      }

      public function getNotSelectedKategoriUmur($id){
        return $this->db->where('id !=',$id)->get('kategori_umur')->result();
      }

      public function getSelectedHubunganPelapor($id){
        return $this->db->where('id',$id)->get('hubungan_pelapor')->row();
      }

      public function getNotSelectedHubunganPelapor($id){
        return $this->db->where('id !=',$id)->get('hubungan_pelapor')->result();
      }

      public function getSelectedBencanaAlam($id){
        return $this->db->where('id',$id)->select('id,nama_bencana_alam')->get('bencana_alam')->row();
      }

      public function getNotSelectedBencanaAlam($id){
        return $this->db->where('id !=',$id)->select('id,nama_bencana_alam')->get('bencana_alam')->result();
      }

      public function getSelectedStatus($id){
        return $this->db->where('id',$id)->get('status_org_hilang')->row();
      }

      public function getNotSelectedStatus($id){
        return $this->db->where('id !=',$id)->get('status_org_hilang')->result();
      }

      public function getOrangHilangById($id){
        return $this->db->where('id',$id)
                        ->get('orang_hilang')
                        ->row();
      }

      public function getGender(){
        return $this->db->get('jenis_kelamin')->result();
      }

      public function getKategoriUmur(){
        return $this->db->get('kategori_umur')->result();
      }

      public function getHubunganPelapor(){
        return $this->db->select('id,nama_hubungan_pelapor')->get('hubungan_pelapor')->result();
      }

      public function getStatus(){
        return $this->db->select('id,nama_status_org')->get('status_org_hilang')->result();
      }

      public function mAddOrangHilang($nama_lengkap,$nama_panggilan,$alamat,$umur,$id_jenis_kelamin,$marga_suku,$warna_kulit,$baju_terakhir,$celana_terakhir,$id_kategori_umur,$foto,$lokasi_terakhir,$lat_lokasi,$lon_lokasi,$nama_ayah,$nama_ibu,$keterangan_lainnya,$nama_pelapor,$no_hp_pelapor,$id_bencana_alam,$id_hubungan_pelapor,$id_status_org_hilang){
        $array = array(
          'id' => '',
          'nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'alamat' => $alamat,
          'umur' => $umur,
          'id_jenis_kelamin' => $id_jenis_kelamin,
          'marga_suku' => $marga_suku,
          'warna_kulit' => $warna_kulit,
          'baju_terakhir' => $baju_terakhir,
          'celana_terakhir' => $celana_terakhir,
          'id_kategori_umur' => $id_kategori_umur,
          'foto' => $foto,
          'lokasi_terakhir' => $lokasi_terakhir,
          'lat_lokasi' => $lat_lokasi,
          'lon_lokasi' => $lon_lokasi,
          'nama_ayah' => $nama_ayah,
          'nama_ibu' => $nama_ibu,
          'keterangan_lainnya' => $keterangan_lainnya,
          'nama_pelapor' => $nama_pelapor,
          'no_hp_pelapor' => $no_hp_pelapor,
          'id_bencana_alam' => $id_bencana_alam,
          'id_hubungan_pelapor' => $id_hubungan_pelapor,
          'id_status_org_hilang' => $id_status_org_hilang,          
        );
        return $this->db->insert('orang_hilang',$array);
      }

      public function mEditOrangHilang($id,$nama_lengkap,$nama_panggilan,$alamat,$umur,$id_jenis_kelamin,$marga_suku,$warna_kulit,$baju_terakhir,$celana_terakhir,$id_kategori_umur,$foto,$lokasi_terakhir,$lat_lokasi,$lon_lokasi,$nama_ayah,$nama_ibu,$keterangan_lainnya,$nama_pelapor,$no_hp_pelapor,$id_bencana_alam,$id_hubungan_pelapor,$id_status_org_hilang){
        $data = array(
          'nama_lengkap' => $nama_lengkap,
          'nama_panggilan' => $nama_panggilan,
          'alamat' => $alamat,
          'umur' => $umur,
          'id_jenis_kelamin' => $id_jenis_kelamin,
          'marga_suku' => $marga_suku,
          'warna_kulit' => $warna_kulit,
          'baju_terakhir' => $baju_terakhir,
          'celana_terakhir' => $celana_terakhir,
          'id_kategori_umur' => $id_kategori_umur,
          'foto' => $foto,
          'lokasi_terakhir' => $lokasi_terakhir,
          'lat_lokasi' => $lat_lokasi,
          'lon_lokasi' => $lon_lokasi,
          'nama_ayah' => $nama_ayah,
          'nama_ibu' => $nama_ibu,
          'keterangan_lainnya' => $keterangan_lainnya,
          'nama_pelapor' => $nama_pelapor,
          'no_hp_pelapor' => $no_hp_pelapor,
          'id_bencana_alam' => $id_bencana_alam,
          'id_hubungan_pelapor' => $id_hubungan_pelapor,
          'id_status_org_hilang' => $id_status_org_hilang,          
        );
        return $this->db->where('id',$id)->update('orang_hilang',$data);
      }

      public function deleteOrangHilang($id){
        $array = array(
          'id' => $id
        );
        return $this->db->delete('orang_hilang',$array);
      }

      public function getFotoById($id)
      {
        return $this->db->where('id', $id)
                        ->select('foto')
                        ->get('orang_hilang')->row();
      }
    }

    /* End of file M_user.php */
/* Location: ./application/models/M_user.php */