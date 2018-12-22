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
            ['field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'],
            
            ['field' => 'password',
            'label' => 'Password',
            'rules' => 'required|min_length[5]']
        ];
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
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */