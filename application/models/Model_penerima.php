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

	public function cek2($where, $table){
		$this->db->where($where);
		$this->db->from($table);
		return $this->db->get();
	}

	public function edit_data($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
		
	}
}
