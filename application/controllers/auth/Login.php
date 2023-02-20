<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('role_id') != 77) {
        // 	redirect('auth/login');
        // }
    }

    public function index()
    {
        $this->load->view('auth/template/header');
        $this->load->view('auth/login');
        $this->load->view('auth/template/footer');
    }

    public function login_user()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_message('required', '{field} Wajib Diisi');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('err_username', form_error('username'));
            $this->session->set_flashdata('err_password', form_error('password'));

            redirect('auth/login');
        } else {
            $auth = $this->Model_login->cek_login();


            if ($auth == false) {
                $this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Password Anda Salah!</div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('id_petugas', $auth->id_petugas);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('password', $auth->password);
                $this->session->set_userdata('nohp', $auth->nohp);
                $this->session->set_userdata('alamat', $auth->alamat);
                $this->session->set_userdata('foto', $auth->foto);
                $this->session->set_userdata('level', $auth->level);
                $this->session->set_userdata('status', $auth->status);
                $this->session->set_flashdata(
                    'berhasil_dashboard',
                    '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Sukses","Berhasil Login","success"); 
								</script>'
                );
                redirect('/');
                // switch ($auth->role) {
                // 	case :

                // 		break;
                // 	default:
                // 		break;
                // }
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
