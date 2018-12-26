<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

	private $_table = "berita";	

    public function rules()
    {
        return [           
            ['field' => 'judul_berita',
            'label' => 'Judul Berita',
            'rules' => 'trim|required'],
            
            ['field' => 'isi',
            'label' => 'Isi Berita',
            'rules' => 'required']
        ];
    }   

    public function label()
    {
       return array(
            'judul_berita' => 'Judul Berita',
            'isi' => 'Isi Berita'
       );
    }

    public function error_msg()
    {
       return array(
            'judul_berita' => form_error('judul_berita'),
            'isi' => form_error('isi')
       );
    }

    public function getBerita()
    {
        return $this->db->join('user', 'berita.id_user=user.id')
                ->select('id,judul_berita, isi, user.name, date, status')
                ->get('berita')->result();
    }

    public function mAddBerita($judul_berita,$isi)
    {
        $object = array(
            'id_berita' => ''  , 
            'judul_berita' => $judul_berita,
            'isi' => $isi,
            'id_user'=>$this->session->userdata('id'),
            'status'=>'0'    
        );
        return $this->db->insert('berita', $object);
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */