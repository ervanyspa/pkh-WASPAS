<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('level') != 'Admin') {
			$this->session->set_flashdata(
				'flashdata_login',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Gagal","Anda Harus Login Terlebih Dahulu","error"); 
							</script>'
			);
			redirect('auth/login');
		}
	}
	
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('profil');
		$this->load->view('templates/footer');
	}
}
