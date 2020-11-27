<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Pelatihan extends CI_Model {

    //fungsi mengambil data pelatihan dari database
    public function getPelatihan($users_id)
	{
        $this->db->select('*');
        $this->db->from('pelatihan');
        $this->db->where('users_id',$users_id);
        $query = $this->db->get();
		return $query->result_array();
    }
    

    //fungsi menambahkan data pelatihan ke database
	public function storePelatihan($data)
	{
		$query = $this->db->insert('pelatihan', $data);
		return $query;
	}

    //fungsi mengubah data pelatihan ke database
	public function updatePelatihan($id,$data){
        $this->db->where(array('id' => $id));
        $res = $this->db->update('pelatihan',$data);
        return $res;
    }

    //fungsi menghapus data pelatihan dari database
    public function deletePelatihan($id)
	{
		$this->db->where(array('id' => $id));
		$res = $this->db->delete("pelatihan");
		return $res;
	}

}

/* End of file pelatihan.php */
