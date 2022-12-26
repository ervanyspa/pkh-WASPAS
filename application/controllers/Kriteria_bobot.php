<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_bobot extends CI_Controller {
	
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('kriteria_bobot');
		$this->load->view('templates/footer');
  	}
	
}
