<?php

class Model_kriteria_bobot extends CI_Model {

	public function get_data($table){
        $this->db->select('*');
        $this->db->from($table);

        return $this->db->get();
    }

	public function cek($where)
	{
		$this->db->where($where);
		$this->db->from('penerima_bantuan');
		return $this->db->get();
	}
}
