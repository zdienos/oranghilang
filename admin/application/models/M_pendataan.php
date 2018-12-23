<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendataan extends CI_Model {

	private $_table = "bencana_alam";

	public $id;
	public $name;
	public $email;
	public $password;
	public $remember_token;
	public $created_at;
	public $updated_at;

  public function rules(){
    return [           
      ['field' => 'email',
       'label' => 'Email',
       'rules' => 'trim|required|valid_email'],
            
      ['field' => 'password',
       'label' => 'Password',
       'rules' => 'required|min_length[5]']
      ];
  }

  public function getOrangHilang(){
    return $this->db->get('orang_hilang')->result();
  }

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */