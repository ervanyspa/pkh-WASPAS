<?php

class Model_periode extends CI_Model {

	public function get_periode(){
        $this->db->select('*');
        $this->db->from('periode');

        return $this->db->get();
    }

	public function get_periode_dashboard(){
        $this->db->select('*');
        $this->db->from('periode');
		$this->db->order_by('id_periode', 'DESC');

        return $this->db->get();
    }

	public function filter($table, $where)
	{
		$this->db->from($table);
		$this->db->where($where);
		return $this->db->get();
	}
}
