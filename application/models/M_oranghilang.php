<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_oranghilang extends CI_Model {

    public function getLimit()
    {
        return $this->db->join('bencana_alam','bencana_alam.id=orang_hilang.id_bencana_alam')->join('status_org_hilang','status_org_hilang.id=orang_hilang.id_status_org_hilang')->join('jenis_kelamin','jenis_kelamin.id=orang_hilang.id_jenis_kelamin')->order_by('tgl_laporan','DESC')->limit(3,0)->get('orang_hilang')->result();
    }

	public function view(){
    $this->load->library('pagination'); // Load librari paginationnya
    
    $query = "SELECT * FROM orang_hilang JOIN bencana_alam on bencana_alam.id=orang_hilang.id_bencana_alam JOIN status_org_hilang on status_org_hilang.id=orang_hilang.id_status_org_hilang ORDER BY `tgl_laporan` DESC"  ; // Query untuk menampilkan semua data siswa
    
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

}

/* End of file M_oranghilang.php */
/* Location: ./application/models/M_oranghilang.php */