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

    public function rulesFormEdit()
    {
        return [           
            ['field' => 'judul_berita',
            'label' => 'Judul Berita',
            'rules' => 'trim|required'],
            
            ['field' => 'isi',
            'label' => 'Isi Berita',
            'rules' => 'required'],

            ['field' => 'status',
            'label' => 'Status Berita',
            'rules' => 'required'],
        ];
    }   

    public function label()
    {
       return array(
            'id_user' =>'Nama User',
            'date' =>'Tanggal',
            'judul_berita' => 'Judul Berita',
            'isi' => 'Isi Berita',
            'status' => 'Status'
       );
    }

    public function error_msg()
    {
       return array(
            'judul_berita' => form_error('judul_berita'),
            'isi' => form_error('isi')
       );
    }

    public function error_msgEdit()
    {
       return array(
            'judul_berita' => form_error('judul_berita'),
            'isi' => form_error('isi'),            
            'status' => form_error('status')
       );
    }

    public function getBerita()
    {
        return $this->db->join('user', 'berita.id_user=user.id')
                ->select('id_berita,judul_berita, isi, user.name, date, status')
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

     public function getBeritaById($id)
    {
        return $this->db->join('user', 'berita.id_user=user.id')
                ->select('id_berita,judul_berita, isi,,user.id, user.name, date, status')
                ->where('id_berita',$id)
                ->get('berita')->row();
    }

    public function deleteBerita($id){
        return $this->db->delete('berita',array('id_berita' => $id));
    }

    public function updateBerita($id_user,$id_berita,$judul_berita,$isi,$status)
    {
        $object = array(            
            'judul_berita' => $judul_berita,
            'isi' => $isi,
            'id_user'=>$id_user,
            'status'=>$status    
        );
        return $this->db->where('id_berita',$id_berita)->update('berita',$object);
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */