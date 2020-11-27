<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PelatihanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        //pencegahan jika ada user yang mengakses halaman ini tanpa login
        if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
        }
        
        $this->load->model('Pelatihan','pelatihan');
        
    }
    
    public function index()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'title' => 'Pelatihan', 
            'pelatihan' => $this->pelatihan->getPelatihan($users_id)
        );
        $this->load->view('layouts/header',$data);
        $this->load->view('user/pelatihan');
        $this->load->view('layouts/footer'); 
    }

    public function store()
    {
        $data = array(
            'nama_kursus' => $this->input->post('nama_kursus'),
            'sertifikat' => $this->input->post('sertifikat'),
            'tahun' => $this->input->post('tahun'),
            'users_id' => $this->session->userdata('id'),
        );
        $this->pelatihan->storePelatihan($data);
        $this->session->set_flashdata('sukses', 'Disimpan');
		redirect('pelatihan');
    }

    public function destroy($id)
    {
        $id = $this->uri->segment(3);
        $this->pelatihan->deletePelatihan($id);
        $this->session->set_flashdata('sukses', 'Dihapus');
		redirect('pelatihan');
    }

}

/* End of file Controllername.php */
