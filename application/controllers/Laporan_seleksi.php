<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_seleksi extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('laporan_seleksi');
		$this->load->view('templates/footer');
	}

	public function detail_perhitungan()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('detail_perhitungan');
		$this->load->view('templates/footer');
	}
}
