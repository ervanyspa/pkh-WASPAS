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

	public function proses_penilaian()
	{
		$data['id_periode'] = $this->session->userdata('id_periode');
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
		$kuisioner = $this->Model_perhitungan->tampil_nilaiAwal($where)->result_array();
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
        $penerima = $this->Model_calon->tampil_detail1($where)->result_array();

		function cariMultiplikasi($array) {
			$output = 1;

			foreach ($array as $x) {
				$output *= $x; 
			}
			
			return $output;
		}

		$a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $data['id_periode']
            );
            $data['kriteria'][$a++]['max']= $this->Model_perhitungan->getmax($where2)->row();
            $data['kriteria'][$i++]['min']= $this->Model_perhitungan->getmin($where2)->row();
        }

		foreach($penerima as $prm){
			$perkalian = array(); 
			$pangkat = array();
            // $b = 0;
            // $c = 0;
            foreach($data['kriteria'] as $ktr) {
                $max = $ktr['max']->nilai;
                
                $min = $ktr['min']->nilai;
                foreach($kuisioner as $ksr){
                    if($prm['id_detail_periode'] == $ksr['id_detail_periode'] && $ktr['id_kriteria'] == $ksr['id_kriteria']){
                        $nilai = $ksr['nilai'];

                        if($ktr['atribut'] == 'Benefit'){
                            $normalisasi = $nilai/$max;                            
                            $preferensi  = $normalisasi * $ktr['bobot'];
							$preferensi2 = pow($normalisasi, $ktr['bobot'])  ;
							array_push($perkalian, $preferensi);
							array_push($pangkat, $preferensi2);
                            // $total+= $preferensi;
                        } else {
                            $normalisasi = $min/$nilai;
                            $preferensi  = $normalisasi * $ktr['bobot'];
							$preferensi2 = pow($normalisasi, $ktr['bobot'])  ;
							array_push($perkalian, $preferensi);
							array_push($pangkat, $preferensi2);
                            // $total+= $preferensi;
                        }
                    }

                }
            }
			$total = 0.5 * array_sum($perkalian) + 0.5 * cariMultiplikasi($pangkat);
            $format = number_format($total, 3);
            $data1 = array(
                "total" => $format
            );
            $where1 = array(
                'id_detail_periode' => $prm['id_detail_periode']
            );
            $this->Model_penerima->edit_data($data1, $where1, 'detail_periode');
        }
		$this->session->set_flashdata(
			'berhasil_peserta_graduasi',
			'<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
						<script type ="text/JavaScript">  
						swal("Sukses","Data Kuisioner Peserta Graduasi Berhasil Diproses","success"); 
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
