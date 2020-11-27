<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegisterController extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        
        //Load model
        $this->load->model('User','user');
    }

    
    public function index()
    {
        $data = array(
            'title' => 'Register', 
        );
        $this->load->view('auth/register',$data); 
    }

    public function register()
    {
        //membuat validasi
        $this->form_validation->set_rules('new_password','Password Baru','required|min_length[5]',
			array(
				'required'=>"<p>Password tidak boleh kosong</p>",
				'min_length'=>"<p>Password minimal 5 Karakter</p>"
			)
		);

        //jika validasi sukses menjalankan perintah berikut
		if ($this->form_validation->run() != false) {

            //ambil inputan dari form
			$new_password = $this->input->post('new_password');
            $repeat_password = $this->input->post('repeat_password');
            $email = $this->input->post('email');
            
            //jika password baru dan ulangi password sama
			if ($new_password == $repeat_password) {

                $cek = $this->user->cekEmail($email);

                if ($cek == 1) {
                    $this->session->set_flashdata('gagal_register', 'email sudah tersedia');
				    redirect('register');
                } else {
                    $data = array(
                        'email' => $email,
                        'password' => sha1($new_password),
                        'role' => 'User',
                    );
                    $this->user->insertUsers($data);
                     $this->session->set_flashdata('sukses_register', 'Pendaftaran berhasil!');
                    redirect('login');
                }

			} else {
                //jika password baru dan ulangi password tidak sama
				$this->session->set_flashdata('gagal_register', 'Password yang anda masukan tidak sama..');
				redirect('register');
			}	

		}else {
            //jika validasi gagal dilemparkan ke halaman register
			$data = array(
                'title' => 'Register', 
            );
            $this->load->view('auth/register',$data); 
		}
    }

}

/* End of file Controllername.php */
