<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima_bantuan extends CI_Controller {
	
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
            redirect('Penerima_bantuan');
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
		redirect('Penerima_bantuan');
    }


	
}
