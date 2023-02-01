<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		if ($this->session->userdata('level') == null) {
			// $this->session->set_flashdata(
			// 	'flashdata_login',
			// 	'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
			// 				<script type ="text/JavaScript">  
			// 				swal("Gagal","Anda Harus Login Terlebih Dahulu","error"); 
			// 				</script>'
			// );
			redirect('auth/login');
		}
	}

    public function index()
    {
		$id = $this->input->post('id_periode');
		$data['periode'] = $this->Model_periode->get_periode_dashboard()->result_array();

		if($id == ''){
            if($this->session->userdata('id_periode') == '' ){
                $this->session->set_userdata('id_periode', $data['periode']['0']['id_periode']);
            }  
        }
        else {
            $this->session->set_userdata('id_periode', $id);
        }

		$where = array(
            'id_periode'  => $this->session->userdata('id_periode'),

        );

		$data['penerima'] = $this->Model_penerima->get_penerima()->result_array();		
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->num_rows();		
        $data['period'] = $this->Model_calon->tampil_data('periode')->num_rows();		
        $data['calon'] = $this->Model_periode->filter('detail_periode', $where)->num_rows();



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('dashboard', $data);
        $this->load->view('templates/footer');
    }

	public function filterperiode()
	{
		$id = $this->input->post('id_periode');
        $this->session->set_userdata('id_periode', $id);
		redirect('/');
	}
}
