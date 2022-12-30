<?php

class Model_penerima extends CI_Model {

	public function get_penerima(){
        $this->db->select('*');
        $this->db->from('penerima_bantuan');

        return $this->db->get();
    }

	public function cek($where)
	{
		$this->db->where($where);
		$this->db->from('penerima_bantuan');
		return $this->db->get();
	}
}
