<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        
        //Load model
        $this->load->model('User');
    }

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function logins()
	{
		//membuat aturan validasi email password
        $this->form_validation->set_rules('email','email','required|min_length[5]',
			array(
				'required'=>"<p class='text-danger'>email tidak boleh kosong</p>",
				'min_length'=>"<p class='text-danger'>email minimal 5 Karakter</p>"
			)
		);
		$this->form_validation->set_rules('password','Password','required|min_length[5]',
			array(
				'required'=>"<p class='text-danger'>Password tidak boleh kosong</p>",
				'min_length'=>"<p class='text-danger'>Password minimal 5 Karakter</p>"
			)
		);

        //Jika validasi sukses menjalankan perintah ini
		if ($this->form_validation->run() != false) {

            //ambil email dan password dari inputan user
			$email = $this->input->post('email');
			$password = $this->input->post('password');
            
            //pengecekan inputan email dan password dari user
            $cek = $this->User->processLogin($email,sha1($password));
            
            //Jika benar
			if ($cek == 1) {
                //ambil data user berdasarkan login
				$row = $this->User->getDataLogin($email,sha1($password));
				$data = array(
					'logged' => TRUE,
					'id' => $row->id,
					'email' => $row->email,
					'role' => $row->role
				);
				$this->session->set_userdata($data);

				redirect('dashboard');
			} else {
                //jika gagal
				$this->session->set_flashdata('gagal_login', 'email dan Password Salah');
				redirect('login');
			}
		} else {
            //jika validasi gagal dilempar kembali ke halaman login
			$this->load->view('auth/login');
		}
	}

	public function logout()
    {
        $this->session->sess_destroy();
		redirect('login');
    }

}

/* End of file LoginController.php */
/* Location: ./application/controllers/LoginController.php */