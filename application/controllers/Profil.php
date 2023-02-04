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

	public function update_profil()
	{
		if (isset($_POST['submit'])) {
			$nama       = $this->input->post('nama');
			$alamat     = $this->input->post('alamat');
			$nohp   	= $this->input->post('nohp');
			$alamat   	= $this->input->post('alamat');
			$username   = $this->input->post('username');
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
					);
					$this->session->set_flashdata(
						'berhasil_profil',
						'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
										<script type ="text/JavaScript">  
										swal("Gambar Gagal Diunggah","Data Profil Berhasil Diubah, Gambar Gagal Diunggah","warning"); 
										</script>'
					);
				} else { //gambar terupload
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
					);
					$this->session->set_flashdata(
						'berhasil_profil',
						'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
										<script type ="text/JavaScript">  
										swal("Sukses","Data Profil Berhasil Diubah","success"); 
										</script>'
					);
				}
			} else { //edit tanpa ganti gambar
				$data2 = array(
					'nama'      => $nama,
					'alamat'    => $alamat,
					'nohp'		=> $nohp,
					'alamat'    => $alamat,
					'username'	=> $username,
				);
				$this->session->set_flashdata(
					'berhasil_profil',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
									<script type ="text/JavaScript">  
									swal("Sukses","Data Profil Berhasil Diubah","success"); 
									</script>'
				);
			}

			$where2 = array('id_petugas' => $this->session->userdata('id_petugas'));
			$this->db->update('petugas', $data2, $where2);
			redirect('profil');
		}
		if(isset($_POST['cancle'])) {
			$this->session->set_flashdata(
				'berhasil_profil',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Gagal","Data Profil Batal Diubah","info"); 
								</script>'
			);

			redirect('profil');
		}
	}

	public function ubah_password()
	{
		if (isset($_POST['submit'])) {
			$data = $this->Model_user->get_user_by_id($this->session->userdata('id_petugas'))->row_array();
			$password_lama       = $this->input->post('password_lama');
			$password_baru     = password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT);
			if (password_verify($password_lama, $data['password'])) {
				$data2 = array(
					'password'      => $password_baru,
				);
				$where2 = array('id_petugas' => $this->session->userdata('id_petugas'));
				$this->db->update('petugas', $data2, $where2);
				$this->session->set_flashdata(
					'berhasil_profil',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
										<script type ="text/JavaScript">  
										swal("Sukses","Password Berhasil Diubah","success"); 
										</script>'
				);
				redirect('profil');
			} else {
				$this->session->set_flashdata(
					'berhasil_profil',
					'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
										<script type ="text/JavaScript">  
										swal("Sukses","Password Anda Salah","error"); 
										</script>'
				);
				redirect('profil');
			}
		}
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_profil',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Gagal","Password Batal Diubah","info"); 
								</script>'
			);

			redirect('profil');
		}



	}
}
