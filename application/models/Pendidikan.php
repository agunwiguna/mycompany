<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pendidikan extends CI_Model {

    //fungsi mengambil data pendidikan dari database
    public function getPendidikan($users_id)
	{
        $this->db->select('*');
        $this->db->from('pendidikan');
        $this->db->where('users_id',$users_id);
        $query = $this->db->get();
		return $query->result_array();
    }
    

    //fungsi menambahkan data pendidikan ke database
	public function storePendidikan($data)
	{
		$query = $this->db->insert('pendidikan', $data);
		return $query;
	}

    //fungsi mengubah data pendidikan ke database
	public function updatePendidikan($id,$data){
        $this->db->where(array('id' => $id));
        $res = $this->db->update('pendidikan',$data);
        return $res;
    }

    //fungsi menghapus data pendidikan dari database
    public function deletePendidikan($id)
	{
		$this->db->where(array('id' => $id));
		$res = $this->db->delete("pendidikan");
		return $res;
	}

}

/* End of file pendidikan.php */
