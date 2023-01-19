<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima_bantuan extends CI_Controller {

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
	
	public function index() {

		$data['penerima'] = $this->Model_penerima->get_penerima()->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('penerima_bantuan',$data);
		$this->load->view('templates/footer');
  	}

	public function tambah_penerima()
	{
		$nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $angkatan   = $this->input->post('angkatan');
        $kategori   = $this->input->post('kategori');
        $status_bantuan = $this->input->post('status_bantuan');

        $where = array(
            'nik'   => $nik
        );

		$cek = $this->Model_penerima->cek($where)->num_rows();
		if ($cek > 0){
            $this->session->set_flashdata(
				'berhasil_penerima',
				'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
							<script type ="text/JavaScript">  
							swal("Gagal","Data NIK Penerima Sudah Ada","warning"); 
							</script>'
			);
            redirect('penerima_bantuan');
        }

		$data2 = array(
            'nik'         => $nik,
            'nama'        => $nama,
            'alamat'      => $alamat,
            'angkatan'    => $angkatan,
            'kategori'    => $kategori,
            'status_bantuan'    => $status_bantuan
            
        );

        $this->db->insert('penerima_bantuan', $data2);
        $this->session->set_flashdata(
			'berhasil_penerima',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Penerima Berhasil Ditambah","success"); 
						</script>'
		);
		redirect('penerima_bantuan');
    }

	public function update_penerima($id_penerima)
	{
		$nik        = $this->input->post('nik');
        $nama       = $this->input->post('nama');
        $alamat     = $this->input->post('alamat');
        $angkatan   = $this->input->post('angkatan');
        $kategori   = $this->input->post('kategori');
        $status_bantuan = $this->input->post('status_bantuan');

		$data2 = array(
            'nik'         => $nik,
            'nama'        => $nama,
            'alamat'      => $alamat,
            'angkatan'    => $angkatan,
            'kategori'    => $kategori,
            'status_bantuan'    => $status_bantuan
            
        );

		$where2 = array('id_penerima_bantuan' => $id_penerima);
		$this->db->update('penerima_bantuan', $data2, $where2);
		
		$this->session->set_flashdata(
			'berhasil_penerima',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Penerima Bantuan Berhasil Diubah","success"); 
						</script>'
		);

		redirect('penerima_bantuan');
	}

	public function delete_penerima($id_penerima)			
	{
		$this->db->delete('penerima_bantuan', array('id_penerima_bantuan' => $id_penerima));
	}


	
}
