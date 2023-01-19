<?php

class Model_login extends CI_Model
{
	public function cek_login()
	{
		$username		= set_value('username');
		$password	= set_value('password');

		$this->input->post('username', $username);
		$this->input->post('password', $password);

		$cek  	= $this->db->get_where('petugas', ['username' => $username] );
		// $cek	= $this->db->get_where('role', ['role' => $role]);

		if ($cek->num_rows() > 0) {
			$hasil = $cek->row();
			if (password_verify($password, $hasil->password)) {
				return $hasil;
			}  else {
				return array();
			}
		} else {
			$this->session->set_flashdata('pesan', '<div style="justify-content:center;" class="text-center alert alert-danger alert-dismissible fade show" role="alert">Username tidak ditemukan!</div>');
			redirect('auth/login');
		}
	}
}
