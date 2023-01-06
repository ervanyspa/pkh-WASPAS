<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta_graduasi extends CI_Controller
{
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
}
