<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pekerjaan extends CI_Model {

    //fungsi mengambil data pekerjaan dari database
    public function getPekerjaan($users_id)
	{
        $this->db->select('*');
        $this->db->from('pekerjaan');
        $this->db->where('users_id',$users_id);
        $query = $this->db->get();
		return $query->result_array();
    }
    

    //fungsi menambahkan data pekerjaan ke database
	public function storePekerjaan($data)
	{
		$query = $this->db->insert('pekerjaan', $data);
		return $query;
	}

    //fungsi mengubah data pekerjaan ke database
	public function updatePekerjaan($id,$data){
        $this->db->where(array('id' => $id));
        $res = $this->db->update('pekerjaan',$data);
        return $res;
    }

    //fungsi menghapus data pekerjaan dari database
    public function deletePekerjaan($id)
	{
		$this->db->where(array('id' => $id));
		$res = $this->db->delete("pekerjaan");
		return $res;
	}

}

/* End of file pekerjaan.php */
