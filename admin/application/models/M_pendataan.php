<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendataan extends CI_Model {

	private $_table = "bencana_alam";

	public $id;
	public $name;
	public $email;
	public $password;
	public $remember_token;
	public $created_at;
	public $updated_at;

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
          'rules' => ''],

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
      public function getOrangHilang(){
        return $this->db->get('orang_hilang')->result();
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
          'id_bencana_alam' => 1,
          'id_hubungan_pelapor' => $id_hubungan_pelapor,
          'id_status_org_hilang' => 1,          
        );
        return $this->db->insert('orang_hilang',$array);
      }

    }

    /* End of file M_user.php */
/* Location: ./application/models/M_user.php */