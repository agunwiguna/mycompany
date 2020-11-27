<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PekerjaanController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        //pencegahan jika ada user yang mengakses halaman ini tanpa login
        if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
        }
        
        $this->load->model('Pekerjaan','pekerjaan');
        
    }
    
    public function index()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'title' => 'Pekerjaan', 
            'pekerjaan' => $this->pekerjaan->getPekerjaan($users_id)
        );
        $this->load->view('layouts/header',$data);
        $this->load->view('user/pekerjaan');
        $this->load->view('layouts/footer'); 
    }

    public function store()
    {
        $data = array(
            'nama_perusahaan' => $this->input->post('nama_perusahaan'),
            'posisi_terakhir' => $this->input->post('posisi_terakhir'),
            'pendapatan_terakhir' => $this->input->post('pendapatan_terakhir'),
            'tahun' => $this->input->post('tahun'),
            'users_id' => $this->session->userdata('id'), 
        );
        $this->pekerjaan->storePekerjaan($data);
        $this->session->set_flashdata('sukses', 'Disimpan');
		redirect('pekerjaan');
    }

    public function destroy($id)
    {
        $id = $this->uri->segment(3);
        $this->pekerjaan->deletePekerjaan($id);
        $this->session->set_flashdata('sukses', 'Dihapus');
		redirect('pekerjaan');
    }

}

/* End of file Controllername.php */
