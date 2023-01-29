<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
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
		$data['user'] = $this->Model_user->get_user()->result_array();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('data_user', $data);
        $this->load->view('templates/footer');
    }

	public function tambah_user()
	{
		$nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $nohp   	= $this->input->post('nohp');
        $alamat   	= $this->input->post('alamat');
        $username   = $this->input->post('username');
        $password   = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $level   	= $this->input->post('level');
        $status 	= $this->input->post('status');
		$foto		= $_FILES['foto']['name'];
		if ($foto	= '') {
		}else {
			$config['upload_path'] 		= './assets/img/uploads/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['file_name']		= 'usr' . date('dmyhis');

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Gambar Gagal diupload";
			}else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data2 = array(
            'nama'      => $nama,
            'alamat'    => $alamat,
            'nohp'		=> $nohp,
            'alamat'    => $alamat,
            'username'	=> $username,
            'password'	=> $password,
            'foto'    	=> $foto,
            'level'    	=> $level,
            'status'    => $status
            
        );

        $this->db->insert('petugas', $data2);
        $this->session->set_flashdata(
			'berhasil_petugas',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Petugas Berhasil Ditambah","success"); 
						</script>'
		);
		redirect('data_user');
    }

	public function update_user($id_petugas)
	{
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $nohp   	= $this->input->post('nohp');
        $alamat   	= $this->input->post('alamat');
        $username   = $this->input->post('username');
        $level   	= $this->input->post('level');
        $status 	= $this->input->post('status');
		$foto		= $_FILES['foto']['name'];
		if ($foto	= '') {
		}else {
			$config['upload_path'] 		= './assets/img/uploads/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['file_name']		= 'usr' . date('dmyhis');

			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('foto')) {
				echo "Gambar Gagal diupload";
			}else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data2 = array(
            'nama'      => $nama,
            'alamat'    => $alamat,
            'nohp'		=> $nohp,
            'alamat'    => $alamat,
            'username'	=> $username,
            'foto'    	=> $foto,
            'level'    	=> $level,
            'status'    => $status
            
        );

		$where2 = array('id_petugas' => $id_petugas);
		$this->db->update('petugas', $data2, $where2);
		
		$this->session->set_flashdata(
			'berhasil_petugas',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Petugas Berhasil Diubah","success"); 
						</script>'
		);

		redirect('data_user');
	}

	public function delete_user($id_petugas)			
	{
		$this->db->delete('petugas', array('id_petugas' => $id_petugas));
	}


}
