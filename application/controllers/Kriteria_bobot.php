<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_bobot extends CI_Controller {

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
	
	public function index() {
		$data['rentang_nilai'] = $this->Model_kriteria_bobot->get_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kriteria_bobot',$data);
		$this->load->view('templates/footer');
		
  	}

	public function tambah_kriteria_bobot()
	{
		$nama_kode        = $this->input->post('nama_kode');
        $jenis_kriteria   = $this->input->post('jenis_kriteria');
        $atribut          = $this->input->post('atribut');
        $bobot            = $this->input->post('bobot');
        $jenis_rentang1   = $this->input->post('jenis_rentang1');
        $jenis_rentang2   = $this->input->post('jenis_rentang2');
        $jenis_rentang3   = $this->input->post('jenis_rentang3');
        $jenis_rentang4   = $this->input->post('jenis_rentang4');
        $nilai1           = $this->input->post('nilai1');
        $nilai2           = $this->input->post('nilai2');
        $nilai3           = $this->input->post('nilai3');
        $nilai4           = $this->input->post('nilai4');

		$data2 = array(
            'nama_kode'         => $nama_kode,
            'jenis_kriteria'   =>  $jenis_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
            
        );

		$save = $this->db->insert('kriteria', $data2);

		if($save) {
			$id =  $this->db->insert_id();
            $datarentang1 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang1,
                'nilai'          => $nilai1,
            );

            $datarentang2 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang2,
                'nilai'          => $nilai2,
            );

            $datarentang3 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang3,
                'nilai'          => $nilai3,
            );

            $datarentang4 = array(
                'id_kriteria'    => $id,
                'jenis_rentang'  => $jenis_rentang4,
                'nilai'          => $nilai4,
            );
		}

		$this->db->insert('rentang_nilai', $datarentang1);
		$this->db->insert('rentang_nilai', $datarentang2);
		$this->db->insert('rentang_nilai', $datarentang3);
		$this->db->insert('rentang_nilai', $datarentang4);
		$this->session->set_flashdata(
			'berhasil_kriteria_bobot',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Kriteria dan Bobot Berhasil Ditambah","success"); 
						</script>'
		);
		redirect('kriteria_bobot');
	}

	public function update_kriteria($id_kriteria)
	{
		$nama_kode        = $this->input->post('nama_kode');
        $jenis_kriteria   = $this->input->post('jenis_kriteria');
        $atribut          = $this->input->post('atribut');
        $bobot            = $this->input->post('bobot');

        $data2 = array(
            'nama_kode'         => $nama_kode,
            'jenis_kriteria'   =>  $jenis_kriteria,
            'atribut'           => $atribut,
            'bobot'             => $bobot
            
        );
        
        $where2 = array(
            'id_kriteria' => $id_kriteria
        );
		$this->db->update('kriteria', $data2, $where2);
		$this->session->set_flashdata(
			'berhasil_kriteria_bobot',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Kriteria Berhasil Diubah","success"); 
						</script>'
		);
		redirect('kriteria_bobot');
	}

	public function update_rentang($id_kriteria)
	{
		$id_rentang1      = $this->input->post('id_rentang1');
        $id_rentang2      = $this->input->post('id_rentang2');
        $id_rentang3      = $this->input->post('id_rentang3');
        $id_rentang4      = $this->input->post('id_rentang4');
        $jenis_rentang1   = $this->input->post('jenis_rentang1');
        $jenis_rentang2   = $this->input->post('jenis_rentang2');
        $jenis_rentang3   = $this->input->post('jenis_rentang3');
        $jenis_rentang4   = $this->input->post('jenis_rentang4');
        $nilai1           = $this->input->post('nilai1');
        $nilai2           = $this->input->post('nilai2');
        $nilai3           = $this->input->post('nilai3');
        $nilai4           = $this->input->post('nilai4');

		$datarentang1 = array(
            'id_kriteria'    => $id_kriteria,
            'jenis_rentang'  => $jenis_rentang1,
            'nilai'          => $nilai1,
        );

        $datarentang2 = array(
            'id_kriteria'    => $id_kriteria,
            'jenis_rentang'  => $jenis_rentang2,
            'nilai'          => $nilai2,
        );

        $datarentang3 = array(
            'id_kriteria'    => $id_kriteria,
            'jenis_rentang'  => $jenis_rentang3,
            'nilai'          => $nilai3,
        );

        $datarentang4 = array(
            'id_kriteria'    => $id_kriteria,
            'jenis_rentang'  => $jenis_rentang4,
            'nilai'          => $nilai4,
        );
        
        $where1 = array(
            'id_rentang' => $id_rentang1 
        );

        $where2 = array(
            'id_rentang' => $id_rentang2 
        );

        $where3 = array(
            'id_rentang' => $id_rentang3 
        );

        $where4 = array(
            'id_rentang' => $id_rentang4 
        );

		$this->db->update('rentang_nilai', $datarentang1, $where1);
		$this->db->update('rentang_nilai', $datarentang2, $where2);
		$this->db->update('rentang_nilai', $datarentang3, $where3);
		$this->db->update('rentang_nilai', $datarentang4, $where4);
		$this->session->set_flashdata(
			'berhasil_kriteria_bobot',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Rentang Nilai Berhasil Diubah","success"); 
						</script>'
		);
		redirect('kriteria_bobot');
	}

	public function delete_kriteria($id_kriteria)
	{
		$this->db->delete('rentang_nilai', array('id_kriteria' => $id_kriteria));
		$this->db->delete('kriteria', array('id_kriteria' => $id_kriteria));
	}
}
