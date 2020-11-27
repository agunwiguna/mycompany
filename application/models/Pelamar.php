<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Model {

    //fungsi mengambil data pelamar dari database
    public function getPelamar($users_id)
	{
        $this->db->select('*');
        $this->db->from('pelamar');
        $this->db->where('user_id',$users_id);
        $query = $this->db->get();
		return $query->result_array();
	}

	public function getDetailPelamar($id)
	{
        $this->db->select('*');
        $this->db->from('pelamar');
        $this->db->where('id',$id);
        $query = $this->db->get();
		return $query->result_array();
	}
	
	public function getPelamarAll()
	{
        $this->db->select('*');
        $this->db->from('pelamar');
        $query = $this->db->get();
		return $query->result_array();
    }
    

    //fungsi menambahkan data pelamar ke database
	public function storePelamar($data)
	{
		$query = $this->db->insert('pelamar', $data);
		return $query;
	}


    //fungsi menghapus data pelamar dari database
    public function deletePelamar($id)
	{
		$this->db->where(array('id' => $id));
		$res = $this->db->delete("pelamar");
		return $res;
	}

}

/* End of file pelamar.php */
