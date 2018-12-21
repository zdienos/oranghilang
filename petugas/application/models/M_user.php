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

    public function userLogin($email,$password)
    {
      return $this->db->join('user_grup','user.id_user_grup=user_grup.id')->get_where('user',array('email' => $email, 'password' => $password, 'id_user_grup' => 2));
    }

    public function getEmail($email){
      return $this->db->where('email',$email)->where('id_user_grup',2)->select('email')->get('user');
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */