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

  public function view(){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = "SELECT id_berita,judul_berita,foto_thumbnail,isi,name,date FROM berita JOIN user on user.id=berita.id_user  ORDER BY `date` DESC "; // Query untuk menampilkan semua data siswa
    
    $config['base_url'] = base_url('berita/index');
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 5;
    $config['uri_segment'] = 3;
    $config['num_links'] = 3;
    
    // Style Pagination
    // Agar bisa mengganti stylenya sesuai class2 yg ada di bootstrap
    $config['full_tag_open']   = '<ul class="pagination pagination-sm m-t-xs m-b-xs">';
        $config['full_tag_close']  = '</ul>';
        
        $config['first_link']      = 'First'; 
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        
        $config['last_link']       = 'Last'; 
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        
        $config['next_link']       = ' <i class="glyphicon glyphicon-menu-right"></i> '; 
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        
        $config['prev_link']       = ' <i class="glyphicon glyphicon-menu-left"></i> '; 
        $config['prev_tag_open']   = '<li>';
        $config['prev_tag_close']  = '</li>';
        
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
         
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';
        // End style pagination
    
    $this->pagination->initialize($config); // Set konfigurasi paginationnya
    
    $page = ($this->uri->segment($config['uri_segment'])) ? $this->uri->segment($config['uri_segment']) : 0;
    $query .= " LIMIT ".$page.", ".$config['per_page'];
    
    $data['limit'] = $config['per_page'];
    $data['total_rows'] = $config['total_rows'];
    $data['pagination'] = $this->pagination->create_links(); // Generate link pagination nya sesuai config diatas
    $data['berita'] = $this->db->query($query)->result();
    
    return $data;
  }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */