<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_oranghilang extends CI_Model {

    public function getLimit()
    {
        return $this->db->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')->order_by('tgl_laporan','DESC')->limit(3,0)->get('orang_hilang')->result();
    }

	public function view(){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = "SELECT keterangan,orang_hilang.id as id_orang, nama_lengkap, nama_panggilan, umur, tgl_laporan, nama_bencana_alam, nama_status_org,lokasi_terakhir,foto FROM orang_hilang JOIN bencana_alam on bencana_alam.id=orang_hilang.id_bencana_alam JOIN status_org_hilang on status_org_hilang.id=orang_hilang.id_status_org_hilang ORDER BY `tgl_laporan` DESC"  ; // Query untuk menampilkan semua data siswa
    
    $config['base_url'] = base_url('oranghilang/index');
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 4;
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
    $data['orang_hilang'] = $this->db->query($query)->result();
    
    return $data;
  }

  public function view_search($name){
    $this->load->library('pagination'); // Load librari paginationnya
    $nama = str_replace('%20', ' ', $name);
    $query = "SELECT orang_hilang.id as id_orang, nama_lengkap, nama_panggilan, umur, tgl_laporan, nama_bencana_alam, nama_status_org,lokasi_terakhir,foto FROM orang_hilang JOIN bencana_alam on bencana_alam.id=orang_hilang.id_bencana_alam JOIN status_org_hilang on status_org_hilang.id=orang_hilang.id_status_org_hilang WHERE nama_lengkap LIKE '%$nama%' ORDER BY `tgl_laporan` DESC"  ; // Query untuk menampilkan semua data siswa
    
    $config['base_url'] = base_url('oranghilang/index');
    $config['total_rows'] = $this->db->query($query)->num_rows();
    $config['per_page'] = 4;
    $config['uri_segment'] = 4;
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
    $data['orang_hilang'] = $this->db->query($query)->result();
    
    return $data;
  }

  public function getDetailOrangById($id)
  {
      return $this->db->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')->join('kategori_umur','kategori_umur.id=orang_hilang.id_kategori_umur')->join('hubungan_pelapor','hubungan_pelapor.id=orang_hilang.id_hubungan_pelapor')->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')->where('orang_hilang.id', $id)->get('orang_hilang')->row();
  }

  public function getOrangHilangByName($name){
    return $this->db->select('orang_hilang.id,nama_lengkap,nama_panggilan,umur,tgl_laporan,lokasi_terakhir,bencana_alam.nama_bencana_alam,status_org_hilang.nama_status_org')
                    ->like('nama_lengkap',$name)
                    ->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')
                    ->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')
                    ->get('orang_hilang')
                    ->result();
  }

}

/* End of file M_oranghilang.php */
/* Location: ./application/models/M_oranghilang.php */