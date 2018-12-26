<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	private $_table = "user";

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

    public function rulesForm()
    {
        return[
            ['field'=>'id_user_grup',
            'label' => 'User Grup',
            'rules' => 'trim|required'],

            ['field'=>'name',
            'label' => 'Nama User',
            'rules' => 'trim|required|min_length[2]'],

            ['field'=>'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email'],

            ['field'=>'password',
            'label' => 'Password',
            'rules' => 'trim|required|min_length[5]'],
        ];
    }

    public function label()
    {
       return array(
            'id_user_grup' => 'Pilih User Grup',
            'name' => 'Nama User',
            'email'=>'Email',
            'password'=>'Password'
       );
    }

    public function error_msg()
    {
       return array(
            'id_user_grup' => form_error('id_user_grup'),
            'name' => form_error('name'),
            'email'=> form_error('email'),
            'password'=>form_error('password')
       );
    }

    public function get_login()
    {
        return $this->db->join('user_grup','user.id_user_grup=user_grup.id')->get_where('user',array('email' => $this->input->post('email'),'password' => md5($this->input->post('password'))));
    }

    public function getEmail($email){
      return $this->db->where('email',$email)->select('email')->get('user')->num_rows();
    }

    public function getUser()
    {
        return $this->db->join('user_grup', 'user_grup.id = user.id_user_grup')
            ->select('user.id,name,email,password,user_grup.nama_grup')
            ->get('user')
            ->result();
    }    

    public function getIdByEmail($email)
    {
        return $this->db->where('email',$email)->select('id')->get('user')->row();
    }

    public function getUserGrup()
    {
        return $this->db->get('user_grup')->result();
    }

    public function mAddUser($name,$email,$password,$id_user_grup)
    {
        $object = array(
            'id' => ''  , 
            'name' => $name,
            'email' => $email,
            'password'=>$password,
            'id_user_grup'=>$id_user_grup
        );
        return $this->db->insert('user', $object);
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */