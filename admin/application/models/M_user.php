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

    public function get_login()
    {
        return $this->db->join('user_grup','user.id_user_grup=user_grup.id')->get_where('user',array('email' => $this->input->post('email'),'password' => md5($this->input->post('password'))));
    }

    public function getEmail($email){
      return $this->db->where('email',$email)->select('email')->get('user')->num_rows();
    }
}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */