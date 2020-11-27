<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        //pencegahan jika ada user yang mengakses halaman ini tanpa login
        if ($this->session->userdata("logged")<>1) {
	      redirect(site_url('login'));
        }
        
        $this->load->model('Pekerjaan','pekerjaan');
        $this->load->model('Pelatihan','pelatihan');
        $this->load->model('Pendidikan','pendidikan');
        $this->load->model('Pelamar','pelamar');
    }
    
    public function index()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'title' => 'Form',
            'pekerjaan' => $this->pekerjaan->getPekerjaan($users_id),
            'pelatihan' => $this->pelatihan->getPelatihan($users_id),
            'pendidikan' => $this->pendidikan->getPendidikan($users_id)

        );
        $this->load->view('layouts/header',$data);
        $this->load->view('user/dashboard');
        $this->load->view('layouts/footer'); 
    }

    public function biodata()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'title' => 'Form',
            'pekerjaan' => $this->pekerjaan->getPekerjaan($users_id),
            'pelatihan' => $this->pelatihan->getPelatihan($users_id),
            'pendidikan' => $this->pendidikan->getPendidikan($users_id),
            'pelamar' => $this->pelamar->getPelamar($users_id)

        );
        $this->load->view('layouts/header',$data);
        $this->load->view('user/pelamar');
        $this->load->view('layouts/footer'); 
    }

    public function detail($id)
    {
        $users_id = $this->uri->segment(3);
        $data = array(
            'title' => 'Form',
            'pekerjaan' => $this->pekerjaan->getPekerjaan($users_id),
            'pelatihan' => $this->pelatihan->getPelatihan($users_id),
            'pendidikan' => $this->pendidikan->getPendidikan($users_id),
            'pelamar' => $this->pelamar->getDetailPelamar($users_id)

        );
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/detail');
        $this->load->view('layouts/footer'); 
    }

    public function pelamar()
    {
        $data = array(
            'title' => 'Pelamar',
            'pelamar' => $this->pelamar->getPelamarAll()

        );
        $this->load->view('layouts/header',$data);
        $this->load->view('admin/pelamar');
        $this->load->view('layouts/footer'); 
    }

    public function store()
    {
        $users_id = $this->session->userdata('id');
        $data = array(
            'user_id' => $users_id,
            'posisi' => $this->input->post('posisi'),
            'nama' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('no_ktp'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'jk' => $this->input->post('jk'),
            'agama' => $this->input->post('agama'),
            'golongan_darah' => $this->input->post('golongan_darah'),
            'status' => $this->input->post('status'),
            'alamat_ktp' => $this->input->post('alamat_ktp'),
            'alamat_tinggal' => $this->input->post('alamat_tinggal'),
            'no_tlp' => $this->input->post('no_tlp'),
            'orang_terdekat' => $this->input->post('orang_terdekat'),
            'skilss' => $this->input->post('skilss'),
            'kesediaan' => $this->input->post('kesediaan'),
            'penghasilan' => $this->input->post('penghasilan'),

        );
        $this->pelamar->storePelamar($data);
        $this->session->set_flashdata('sukses', 'Disimpan');
		redirect('dashboard');
    }

}

/* End of file Controllername.php */
