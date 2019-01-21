<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

  public $id;
	public $name;
	public $email;
	public $password;
	public $remember_token;
	public $created_at;
  public $updated_at;
  
  public function getRowPetugas(){
    return $this->db->select('id')->where('id_user_grup',2)->get('user')->num_rows();
  }

  public function getRowBeritaPublished(){
    return $this->db->select('id_berita')->where('status',1)->get('berita')->num_rows();
  }

  public function getRowBeritaUnpublished(){
    return $this->db->select('id_berita')->where('status',0)->get('berita')->num_rows();
  }

  public function getRowOrangProsesPencarian(){
    return $this->db->select('id')->where('id_status_org_hilang',1)->get('orang_hilang')->num_rows();
  }

  public function getRowOrangHilangDitemukan(){
    return $this->db->select('id')->where('id_status_org_hilang',2)->get('orang_hilang')->num_rows();
  }

  public function getRowOrangTidakDitemukan(){
    return $this->db->select('id')->where('id_status_org_hilang',3)->get('orang_hilang')->num_rows();
  }

  public function getRowOrangHilangDitemukanMeninggal(){
    return $this->db->select('id')->where('id_status_org_hilang',4)->get('orang_hilang')->num_rows();
  }

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */