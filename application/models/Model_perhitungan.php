<?php

class Model_perhitungan extends CI_Model {

	public function tampil_nilaiAwal($where){
		$this->db->select('*');
		$this->db->from('kuisioner');
		$this->db->join('detail_periode', 'detail_periode.id_detail_periode=kuisioner.id_detail_periode');
		$this->db->join('rentang_nilai', 'rentang_nilai.id_rentang=kuisioner.id_rentang');
		$this->db->where($where);
		return $this->db->get();

	}

	public function getmax($where){
		//cari nilai maximum per kriteria
		$this->db->select_max('nilai');
		$this->db->join('detail_periode', 'detail_periode.id_detail_periode=kuisioner.id_detail_periode');
		$this->db->join('rentang_nilai', 'rentang_nilai.id_rentang=kuisioner.id_rentang');
		$this->db->where($where);
		return $this->db->get('kuisioner');

	}


	public function getmin($where){
		//cari nilai minimum per kriteria
		$this->db->select_min('nilai');
		$this->db->join('detail_periode', 'detail_periode.id_detail_periode=kuisioner.id_detail_periode');
		$this->db->join('rentang_nilai', 'rentang_nilai.id_rentang=kuisioner.id_rentang');
		$this->db->where($where);
		return $this->db->get('kuisioner');

	}
}
