<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PendidikanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        //pencegahan jika ada user yang mengakses halaman ini tanpa login
        if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
        }
        
        $this->load->model('Pendidikan','pendidikan');
        
    }
    
    public function index()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'title' => 'Pendidikan', 
            'pendidikan' => $this->pendidikan->getPendidikan($users_id)
        );
        $this->load->view('layouts/header',$data);
        $this->load->view('user/pendidikan');
        $this->load->view('layouts/footer'); 
    }

    public function store()
    {
        $data = array(
            'jenjang' => $this->input->post('jenjang'),
            'nama_institusi' => $this->input->post('nama_institusi'),
            'jurusan' => $this->input->post('jurusan'),
            'tahun_lulus' => $this->input->post('tahun_lulus'),
            'ipk' => $this->input->post('ipk'),
            'users_id' => $this->session->userdata('id'), 
        );
        $this->pendidikan->storePendidikan($data);
        $this->session->set_flashdata('sukses', 'Disimpan');
		redirect('pendidikan');
    }

    public function destroy($id)
    {
        $id = $this->uri->segment(3);
        $this->pendidikan->deletePendidikan($id);
        $this->session->set_flashdata('sukses', 'Dihapus');
		redirect('pendidikan');
    }

}

/* End of file Controllername.php */
