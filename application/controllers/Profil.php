<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('level') == null) {
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
		$data['petugas'] = $this->Model_user->get_user_by_id($this->session->userdata('id_petugas'))->row_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('profil', $data);
		$this->load->view('templates/footer');
	}
}
