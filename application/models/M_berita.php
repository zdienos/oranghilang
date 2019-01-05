<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

  private $_table = "berita";
  	
  public function __construct() {
    parent::__construct();
  }
  
  public function getBeritaCarousel(){
    return $this->db->order_by('date','DESC')->limit(3,0)->where('status',1)->get('berita')->result();
  }

  public function getBeritaKotak(){
    return $this->db->order_by('date','DESC')->limit(2,1)->where('status',1)->get('berita')->result();
  }

  public function view(){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = "SELECT id_user,id_berita,judul_berita,foto_thumbnail,isi,name,slug,date FROM berita JOIN user on user.id=berita.id_user WHERE status = 1  ORDER BY `date` DESC "; // Query untuk menampilkan semua data siswa
    
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

  public function viewUser($id){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = 'SELECT id_user,id_berita,judul_berita,foto_thumbnail,isi,name,slug,date FROM berita JOIN user on user.id=berita.id_user WHERE status = 1 AND id_user='.$id.''; // Query untuk menampilkan semua data siswa
    
    $config['base_url'] = base_url('berita/user/');
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 5;
    $config['uri_segment'] = 4;
    $config['num_links'] = 4;
    
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

  public function viewTag($nama_tag){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = 'SELECT id_user,tags_berita.id_berita,judul_berita,foto_thumbnail,isi,name,slug,date FROM tags_berita JOIN 
    berita on berita.id_berita=tags_berita.id_berita JOIN tag on tag.id_tag=tags_berita.id_tag JOIN
    user on user.id=berita.id_user WHERE status = 1 AND nama_tag ="'.$nama_tag.'" '; // Query untuk menampilkan semua data siswa
    
    $config['base_url'] = base_url('berita/user/');
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 5;
    $config['uri_segment'] = 4;
    $config['num_links'] = 4;
    
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

  public function getBeritaById($slug)
  {
    return $this->db->join('user','user.id=berita.id_user')->where('slug',$slug)->get('berita')->row();
  }

  public function getTagsBeritaByIdBerita($slug)
  {
    return $this->db->join('tag','tag.id_tag=tags_berita.id_tag')->join('berita','berita.id_berita=tags_berita.id_berita')->where('slug',$slug)->get('tags_berita')->result();
  }

  public function getBeritalain($slug)
  {
    return $this->db->select('foto_thumbnail,judul_berita,slug')->where_not_in('slug',array($slug))->order_by('date', 'ASC')->get('berita', 2, 0)->result();
  }

  public function checkSlug($slug)
  {
    return $this->db->select('id_berita,slug')->where('slug', $slug)->get('berita')->num_rows();
  }

  public function checkUser($id_user)
  {
    return $this->db->select('id_berita,id_user')->where('id_user', $id_user)->where('status', 1)->get('berita')->num_rows();
  }

  public function getName($id_user)
  {
    return $this->db->select('name')->join('user','user.id=berita.id_user')->where('id_user',$id_user)->get('berita')->row();
  }

  public function checkTagsBerita($nama_tag)
  {
    return $this->db->select('nama_tag')->join('berita','tags_berita.id_berita=berita.id_berita')->join('tag','tag.id_tag=tags_berita.id_tag')->where('nama_tag', $nama_tag)->where('status', 1)->get('tags_berita')->num_rows();
  }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */