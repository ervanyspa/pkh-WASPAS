<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_seleksi extends CI_Controller
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
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('laporan_seleksi');
		$this->load->view('templates/footer');
	}

	public function detail_perhitungan()
	{
		$where = array(
            'detail_periode.id_periode'  => $this->session->userdata('id_periode')
        );
        $data['kuisioner'] = $this->Model_perhitungan->tampil_nilaiAwal($where)->result_array();
        $data['penerima'] = $this->Model_calon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->Model_kriteria_bobot->get_data('rentang_nilai')->result_array();
        $data['id_periode'] = $this->session->userdata('id_periode') ;
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode'  => $this->session->userdata('id_periode')
            );
            $data['kriteria'][$a++]['max']= $this->Model_perhitungan->getmax($where)->row();
            $data['kriteria'][$i++]['min']= $this->Model_perhitungan->getmin($where)->row();
        }
		
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_perhitungan', $data);
		$this->load->view('templates/footer');
	}

	public function filterperiode()
	{
		$id = $this->input->post('id_periode');
        $this->session->set_userdata('id_periode', $id);
		if($_SERVER['HTTP_REFERER'] == base_url('laporan_seleksi')) {
			redirect('laporan_seleksi');
		}
		if($_SERVER['HTTP_REFERER'] == base_url('laporan_seleksi/detail_perhitungan')) {
			redirect('laporan_seleksi/detail_perhitungan');
		}
		
	}	
}
