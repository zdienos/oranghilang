<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_berita extends CI_Model {

  private $_table = "berita";
  	
  public function __construct() {
    parent::__construct();
  }
    public function rules()
    {
        return [           
            ['field' => 'judul_berita',
            'label' => 'Judul Berita',
            'rules' => 'trim|required'],
            
            ['field' => 'isi',
            'label' => 'Isi Berita',
            'rules' => 'required'],

            ['field' => 'foto_header',
            'label' => 'Foto Header Berita',
            'rules' => ''],

            ['field' => 'foto_thumbnail',
            'label' => 'Foto Thumbnail',
            'rules' => ''],

            ['field' => 'tag',
            'label' => 'Tag Berita',
            'rules' => 'trim|required|regex_match[/^[a-z0-9 ,]+$/]']

        ];
    }   
    function file_selected_test(){        
        if (empty($_FILES['foto_header']['name'])) {
                return false;
            }else{
                return true;
            }
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

            ['field' => 'foto_header',
            'label' => 'Foto Header Berita',
            'rules' => ''],

            ['field' => 'foto_thumbnail',
            'label' => 'Foto Thumbnail',
            'rules' => ''],

            ['field' => 'tag',
            'label' => 'Tag Berita',
            'rules' => 'trim|required|regex_match[/^[a-z0-9 ,]+$/]']
        ];
    }   

    public function label()
    {
       return array(
            'id_user' =>'Nama User',
            'date' =>'Tanggal',
            'judul_berita' => 'Judul Berita',
            'isi' => 'Isi Berita',
            'status' => 'Status',
            'tag' => 'Tag Berita',
            'foto_header' => 'Foto Header Berita',
            'foto_thumbnail' => 'Foto Thumbnail Berita',
       );
    }

    public function error_msg()
    {
       return array(
            'judul_berita' => form_error('judul_berita'),
            'isi' => form_error('isi'),
            'tag' => form_error('tag'),
            'foto_header' => form_error('foto_header'),
            'foto_thumbnail' => form_error('foto_thumbnail')
       );
    }

    public function error_msgEdit()
    {
       return array(
            'judul_berita' => form_error('judul_berita'),
            'isi' => form_error('isi'),            
            'status' => form_error('status'),
            'tag' => form_error('tag'),
            'foto_header' => form_error('foto_header'),
            'foto_thumbnail' => form_error('foto_thumbnail')
       );
    }

    public function json(){
      $status = array(
        0 => 'Unpublished',
        1 => 'Published'
      );
      return $this->datatables->select('judul_berita,date,status,berita.id_berita,user_grup.nama_grup')
                              ->join('user','user.id=berita.id_user')
                              ->join('user_grup','user_grup.id_grup=user.id_user_grup')
                              ->add_column('aksi','
                                  <form action="'.base_url('berita/detail/$1').'" method="post">
                                    <button type="submit" class="btn cur-p btn-success ti-eye"></button>
                                  </form>
                                  <form action="'.base_url('berita/edit/$1').'" method="post">
                                    <button type="submit" class="btn cur-p btn-primary ti-pencil"></button>
                                  </form>
                                  <form action="'.base_url('berita/delete/$1').'" method="post">
                                    <button id="btnDelete" type="submit" class="btn cur-p btn-danger ti-trash" onclick="return confirm(Are you sure to delete this item ?)"></button>
                                  </form>',
                                  'id_berita')
                              ->from('berita')  
                              ->generate();
    }

    public function getBerita()
    {
        return $this->db->join('user', 'berita.id_user=user.id')
                ->select('id_berita,judul_berita, isi, user.name, date, status')
                ->get('berita')->result();
    }

    public function mAddBerita($judul_berita,$isi,$foto_header,$foto_thumbnail)
    {
        $object = array(
            'id_berita' => ''  , 
            'judul_berita' => $judul_berita,
            'isi' => $isi,
            'id_user'=>$this->session->userdata('id'),
            'foto_header'=>$foto_header,
            'foto_thumbnail'=>$foto_thumbnail,
            'status'=>'0'    
        );
        return $this->db->insert('berita', $object);
    }

     public function getBeritaById($id)
    {
        return $this->db->join('user', 'berita.id_user=user.id')                
                ->where('id_berita',$id)
                ->get('berita')->row();
    }

    public function deleteBerita($id){
        return $this->db->delete('berita',array('id_berita' => $id));
    }

    public function updateBerita($id_user,$id_berita,$judul_berita,$isi,$foto_header,$foto_thumbnail,$status)
    {
        $object = array(            
            'judul_berita' => $judul_berita,
            'isi' => $isi,
            'foto_header' => $foto_header,
            'foto_thumbnail' => $foto_thumbnail,
            'id_user'=>$id_user,
            'status'=>$status    
        );
        return $this->db->where('id_berita',$id_berita)->update('berita',$object);
    }
    public function getAllTag()
    {
        return $this->db->get('tag')->result_array();
    }

    public function getWhereTag($tag){
      return $this->db->where('nama_tag',$tag)->get('tag')->num_rows();
    }

    public function getWhereTagsBeritaByIdTagAndIdBerita($id_berita,$id_tag)
    {
        # code...
    }

    public function getTagByName($name)
    {
        return $this->db->where('nama_tag', $name)->get('tag')->row();
    }

    public function getTagById($id)
    {
        return $this->db->where('id_tag', $id)->get('tag')->row();
    }

    public function insertTagsBerita($id_tag)
    {
        $berita = $this->db->select('id_berita')
                              ->order_by('id_berita', 'desc')
                              ->limit(1)
                              ->get('berita')
                              ->row();
        $object = array(
            'id_berita' => $berita->id_berita,
            'id_tag' => $id_tag
        );
        return $this->db->insert('tags_berita', $object);
    }

    public function insertTagsBeritaAll()
    {
        $berita = $this->db->select('id_berita')
                              ->order_by('id_berita', 'desc')
                              ->limit(1)
                              ->get('berita')
                              ->row();
        $tag = $this->db->select('id_tag')
                              ->order_by('id_tag', 'desc')
                              ->limit(1)
                              ->get('tag')
                              ->row();
        $object = array(
            'id_berita' => $berita->id_berita,
            'id_tag' => $tag->id_tag
        );
        return $this->db->insert('tags_berita', $object);
    }

    public function insertTagsBeritaIdBerita($id_berita)
    {
        $tag = $this->db->select('id_tag')
                              ->order_by('id_tag', 'desc')
                              ->limit(1)
                              ->get('tag')
                              ->row();
        $object = array(
            'id_berita' => $id_berita,
            'id_tag' => $tag->id_tag
        );
        return $this->db->insert('tags_berita', $object);
    }

    public function inserTagBeritaIdTag($id_berita,$id_tag)
    {
        $object = array(
            'id_berita' => $id_berita,
            'id_tag' => $id_tag
        );
        return $this->db->insert('tags_berita', $object);
    }

    public function insertTag($tag)
    {
        $object = array(
            'nama_tag' => $tag, 
        ); return $this->db->insert('tag', $object);
    }

    public function getTagsBeritaById($id)
    {
        return $this->db->join('tag','tag.id_tag=tags_berita.id_tag')
                        ->select('nama_tag')
                        ->where('id_berita', $id)->get('tags_berita')->result();
    }

    public function countTagsBeritaWhereIdBerita($id_berita)
    {
        return $this->db->where('id_berita',$id_berita)->get('tags_berita')->num_rows();
    }

    public function checkTagsBeritaName($nama)
    {
        return $this->db->join('tag', 'tag.id_tag=tags_berita.id_tag')
                        ->where('nama_tag',$nama)
                        ->get('tags_berita')
                        ->row();
    }
    public function checkTagsBeritaName2($id_berita,$nama_tag)
    {
        return $this->db->query("SELECT * FROM tags_berita join tag on tag.id_tag=tags_berita.id_tag 
            WHERE nama_tag NOT IN (".$nama_tag.") AND id_berita = ".$id_berita."")->result();
    }

    public function deleteTagsBerita($id_berita,$id_tag)
    {
        return $this->db->delete('tags_berita',array('id_berita' => $id_berita,'id_tag'=>$id_tag));
    }

    public function getFotoByIdBerita($id)
    {
        return $this->db->select('foto_header,foto_thumbnail')
                 ->where('id_berita',$id)
                 ->get('berita')->row();
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */