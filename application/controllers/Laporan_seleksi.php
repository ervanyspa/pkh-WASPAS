<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_seleksi extends CI_Controller
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
		$data['id_periode'] = $this->session->userdata('id_periode');
        $where = array(
            'detail_periode.id_periode' => $data['id_periode']
        );
        
        $data['hasil'] = $this->session->userdata('hasil');
        $cek = $this->Model_penerima->cek2($where, 'detail_periode')->num_rows();
        $jumlah = $cek*($data['hasil']/100) ;		
        $final = number_format($jumlah, 0);
        
        $data['penerima'] = $this->Model_perhitungan->peringkat($where, $final)->result_array();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('laporan_seleksi', $data);
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

	public function filter_hasil()
    {
        $hasil = $this->input->post('hasil');
        $this->session->set_userdata('hasil', $hasil);
        redirect('laporan_seleksi');
    }


	public function PrintHasil($id)
    {
        // Memanggil id untuk tampilan laporannya
        $where = array(
            'detail_periode.id_periode' => $id
        );
        // Memanggil id untuk judul halaman print
        $where3 = array(
            'id_periode'  => $id
        );
        $data['periode'] = $this->Model_periode->tampil_data1($where3);
        // memanggil nilai awal
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

        // variabel untuk memanggil nilai max min
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] as $ktr){
            $where2 = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode' => $id
            );
            //Menentuka nilai max min
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
                        // Mengitung total nilai preferensi
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
            // memasukkan / update nilai total ke db
            $this->Model_penerima->edit_data($data1, $where1, 'detail_periode');
        }

        $data['hasil'] = $this->session->userdata('hasil');
        $cek = $this->Model_penerima->cek2($where, 'detail_periode')->num_rows();
        // menentukan hasil rekomendasi
        $jumlah = $cek*($data['hasil']/100) ;
        $final = number_format($jumlah, 0);
        
        $data['penerima'] = $this->Model_perhitungan->peringkat($where, $final)->result_array();

        $this->load->library('pdfgenerator');

        // / title dari pdf
        $data['title_pdf'] = 'Data Rekomendasi Graduasi';

        // filename dari pdf ketika didownload
		foreach($data['periode'] as $prd) {
			$nama_periode = $prd['nama_periode'];
		}
        $file_pdf = 'Data Rekomendasi Graduasi - '. $nama_periode;  
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('pdf/view_printHasil', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

	public function PrintDetail($id)
    {
        $where = array(
            'detail_periode.id_periode'  => $id
        );
        $data['kuisioner'] = $this->Model_perhitungan->tampil_nilaiAwal($where)->result_array();
        $data['penerima'] = $this->Model_calon->tampil_detail($where)->result_array();
        $data['rentang_nilai'] = $this->Model_kriteria_bobot->get_data('rentang_nilai')->result_array();
        $data['kriteria'] = $this->Model_kriteria_bobot->get_data('kriteria')->result_array();
        // Memanggil id untuk judul halaman print
        $where3 = array(
            'id_periode'  => $id
        );
        $data['periode'] = $this->Model_periode->tampil_data1($where3);
        // echo print_r($data['kriteria']);
        $a = 0;
        $i = 0;
        foreach($data['kriteria'] AS $ktr){
            $where = array(
                'kuisioner.id_kriteria'  => $ktr['id_kriteria'],
                'detail_periode.id_periode'  => $id
            );
            $data['kriteria'][$a++]['max']= $this->Model_perhitungan->getmax($where)->row();
            $data['kriteria'][$i++]['min']= $this->Model_perhitungan->getmin($where)->row();
        }

        $this->load->library('pdfgenerator');

        // filename dari pdf ketika didownload
		foreach($data['periode'] as $prd) {
			$nama_periode = $prd['nama_periode'];
		}

        $file_pdf = 'Detail Perhitungan Rekomendasi Graduasi PKH - '. $nama_periode;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('pdf/view_printDetail', $data, true);

        // run dompdf
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }
}
