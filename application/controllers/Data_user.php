<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_user extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('level') == null) {
			$this->session->set_flashdata(
				'flashdata_login',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Gagal","Anda Harus Login Menggunakan Akun Superadmin","error"); 
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

		if (!empty($foto)) { //gambar tdk kosong
			$config['upload_path'] 		= './assets/img/uploads/';
			$config['allowed_types'] 	= 'jpg|jpeg|png';
			$config['file_name']		= 'usr' . date('dmyhis');
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('foto')) { //gambar tidak terupload
				
				$data2 = array(
					
					'nama'      => $nama,
            		'alamat'    => $alamat,
					'nohp'		=> $nohp,
					'alamat'    => $alamat,
					'username'	=> $username,
					'level'    	=> $level,
					'status'    => $status
				);
				$this->session->set_flashdata(
					'berhasil_petugas',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Gambar Gagal Diunggah","Data Petugas Berhasil Diubah, Gambar Gagal Diunggah","warning"); 
								</script>'
				);

			}else { //gambar terupload
				$this->db->select('foto')->from('petugas')->where('id_petugas', $id);
				$query = $this->db->get();
				if ($query->num_rows() > 0) { //hapus gambar sebelumnya
					$img_name = $query->row()->foto;
					unlink("./assets/img/uploads/" . $img_name);
				}
				//mengganti gambar
				$foto = $this->upload->data('file_name');
				$this->db->set('foto', $foto);
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
				$this->session->set_flashdata(
					'berhasil_petugas',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Sukses","Data Petugas Berhasil Diubah","success"); 
								</script>'
				);
			}
		}else { //edit tanpa ganti gambar
			$data2 = array(
				'nama'      => $nama,
				'alamat'    => $alamat,
				'nohp'		=> $nohp,
				'alamat'    => $alamat,
				'username'	=> $username,
				'level'    	=> $level,
				'status'    => $status
			);
			$this->session->set_flashdata(
				'berhasil_petugas',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Sukses","Data Petugas Berhasil Diubah","success"); 
							</script>'
			);
		}

		$where2 = array('id_petugas' => $id_petugas);
		$this->db->update('petugas', $data2, $where2);
		
		redirect('data_user');
	}

	public function delete_user($id_petugas)			
	{
		$this->db->delete('petugas', array('id_petugas' => $id_petugas));
	}

	public function update_password($id_petugas)
	{
        $password       = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

		$data2 = array(
            'password'      => $password,
            
        );

		$where2 = array('id_petugas' => $id_petugas);
		$this->db->update('petugas', $data2, $where2);
		
		$this->session->set_flashdata(
			'berhasil_petugas',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Password Berhasil Diubah","success"); 
						</script>'
		);

		redirect('data_user');
		
	}

}
