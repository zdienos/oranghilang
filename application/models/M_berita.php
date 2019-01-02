<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

  private $_table = "berita";
  	
  public function __construct() {
    parent::__construct();
  }
  
  public function getBeritaCarousel(){
    return $this->db->order_by('id_berita','DESC')->limit(3,0)->get('berita')->result();
  }

  public function getBeritaKotak(){
    return $this->db->order_by('id_berita','DESC')->limit(2,1)->get('berita')->result();
  }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */