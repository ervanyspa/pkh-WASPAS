<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_graduasi extends CI_Controller
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
        $data['id_periode'] = $this->input->post('id_periode');
        if ($data['id_periode'] == '') {
            $data['id_periode'] = $this->session->userdata('id_periode');
        }
        $where1 = array(
            'id_periode'  => $this->session->userdata('id_periode')
        );
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );

        $data['dataterisi'] = $this->Model_periode->filter('detail_periode', $where1)->result_array();
        $data['penerimaB'] = $this->Model_penerima->get_penerima()->result_array();
        $data['rentang_nilai'] = $this->Model_kriteria_bobot->get_data('rentang_nilai')->result_array();
        $data['calon'] = $this->Model_periode->filter('detail_periode', $where)->result_array();
        $data['penerima'] = $this->Model_calon->get_dataKuis($where)->result_array();
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
        $data['period'] = $this->Model_periode->filter('periode', $where1)->result_array();
		$data['kuisioner'] = $this->Model_calon->kuis($where)->result_array();

        $i = 0;
        foreach($data['kriteria'] as $krt){
            $where2 = array(
                'id_kriteria' => $krt['id_kriteria']
            );
            $data['kriteria'][$i++]['rentang'] = $this->Model_periode->filter('rentang_nilai', $where2)->result_array();
        }

        $this->load->view('templates/header');
        $this->load->view('templates/sidebar');
        $this->load->view('peserta_graduasi', $data);
        $this->load->view('templates/footer');
    }

	public function tambah_peserta_graduasi()
	{
		$id_penerima_bantuan   = $this->input->post('id_penerima_bantuan');
        $id_periode            = $this->input->post('id_periode');
        $kriteria              = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
        $data1 = array(
            'id_penerima_bantuan'  => $id_penerima_bantuan,
            'id_periode'           => $id_periode
        );


		$save = $this->db->insert('detail_periode', $data1);
        if($save) {
            $id = $this->db->insert_id();

            foreach ($kriteria as $ktr ){
                $id_kriteria   =   $this->input->post('id_kriteria'. $ktr['id_kriteria']);
                $id_rentang    =   $this->input->post('id_rentang'. $ktr['id_kriteria']);
                $data = array(
                    'id_kriteria'             => $id_kriteria,
                    'id_rentang'              => $id_rentang,
                    'id_petugas'              => $this->session->userdata('id_petugas'),
                    'id_detail_periode'       => $id

                );

				$this->db->insert('kuisioner', $data);
            }
        }
        $this->session->set_flashdata(
			'berhasil_peserta_graduasi',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Kuisioner Peserta Graduasi Berhasil Ditambah","success"); 
						</script>'
		);
        redirect('peserta_graduasi');
	}

	public function update_peserta_graduasi()
	{
		$kriteria	= $this->Model_kriteria_bobot->get_data('kriteria')->result_array();

        foreach ($kriteria as $ktr ){
            $id_kuisioner  =   $this->input->post('id_kuisioner'. $ktr['id_kriteria']);
            $id_kriteria   =   $this->input->post('id_kriteria'. $ktr['id_kriteria']);
            $id_rentang    =   $this->input->post('id_rentang'. $ktr['id_kriteria']);
            $data = array(
                'id_kriteria'             => $id_kriteria,
                'id_rentang'              => $id_rentang,


            );
            $where = array(
                'id_kuisioner' => $id_kuisioner 
            );
			$this->db->update('kuisioner', $data, $where);
        }
		$this->session->set_flashdata(
			'berhasil_peserta_graduasi',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Kuisioner Peserta Graduasi Berhasil Diubah","success"); 
						</script>'
		);
        redirect('peserta_graduasi');
	}

	public function delete_peserta_graduasi($id_detail_periode)
	{

		$this->db->delete('kuisioner', array('id_detail_periode' => $id_detail_periode));
		$this->db->delete('detail_periode', array('id_detail_periode' => $id_detail_periode));

	}

	public function filterperiode()
	{
		$id = $this->input->post('id_periode');
        $this->session->set_userdata('id_periode', $id);
		redirect('peserta_graduasi');
	}
}
