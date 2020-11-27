<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

	//mengambil data user untuk pengecekan login 
    public function processLogin($email,$password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query =  $this->db->get('users');
		return $query->num_rows();
	}

	 public function cekEmail($email) {
		$this->db->where('email', $email);
		$query =  $this->db->get('users');
		return $query->num_rows();
	}

    //mengambil data user yang telah berhasil login
	public function getDataLogin($email,$password) {
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		return $this->db->get('users')->row();
	}

	public function insertUsers($data)
	{
		$query = $this->db->insert('users', $data);
		return $query;
	}

}

/* End of file Users.php */
/* Location: ./application/models/Users.php */