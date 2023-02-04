<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Periode_graduasi extends CI_Controller
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
		$data['periode'] = $this->Model_periode->get_periode()->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('periode_graduasi', $data);
		$this->load->view('templates/footer');
	}

	public function tambah_periode()
	{
			$nama_periode  = $this->input->post('nama_periode');
			$tgl_dimulai   = $this->input->post('tgl_dimulai');
			$tgl_berakhir  = $this->input->post('tgl_berakhir');

			$data2 = array(
				'nama_periode'         => $nama_periode,
				'tgl_dimulai'          => $tgl_dimulai,
				'tgl_berakhir'         => $tgl_berakhir,

			);

			$this->db->insert('periode', $data2);
			$this->session->set_flashdata(
				'berhasil_periode',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Sukses","Data Periode Berhasil Ditambah","success"); 
								</script>'
			);

			redirect('periode_graduasi');		
	}

	public function update_periode($id_periode)
	{
		if (isset($_POST['submit'])) {
			$nama_periode  = $this->input->post('nama_periode');
			$tgl_dimulai   = $this->input->post('tgl_dimulai');
			$tgl_berakhir  = $this->input->post('tgl_berakhir');

			$data2 = array(
				'nama_periode'         => $nama_periode,
				'tgl_dimulai'          => $tgl_dimulai,
				'tgl_berakhir'         => $tgl_berakhir,

			);

			$where2 = array('id_periode' => $id_periode);
			$this->db->update('periode', $data2, $where2);

			$this->session->set_flashdata(
				'berhasil_periode',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Sukses","Data Periode Berhasil Diubah","success"); 
								</script>'
			);

			redirect('periode_graduasi');
		}
		if (isset($_POST['cancel'])) {
			$this->session->set_flashdata(
				'berhasil_periode',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
								<script type ="text/JavaScript">  
								swal("Batal","Data Periode Batal Diubah","info"); 
								</script>'
			);

			redirect('periode_graduasi');
		}
	}

	public function delete_periode($id_periode) {
		
		$this->db->delete('periode', array('id_periode' => $id_periode));

	}
}
