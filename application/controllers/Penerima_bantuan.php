<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerima_bantuan extends CI_Controller {
	
	public function index() {
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('penerima_bantuan');
		$this->load->view('templates/footer');
  	}
	
}
