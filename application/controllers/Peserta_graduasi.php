<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta_graduasi extends CI_Controller {
	
		public function index() {
				$this->load->view('templates/header');
				$this->load->view('templates/sidebar');
				$this->load->view('peserta_graduasi');
				$this->load->view('templates/footer');
  	}
	
}
