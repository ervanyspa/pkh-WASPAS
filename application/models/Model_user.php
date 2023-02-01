<?php

class Model_user extends CI_Model {

	public function get_user(){
        $this->db->select('*');
        $this->db->from('petugas');

        return $this->db->get();
    }

	public function edit_data($data, $where, $table)
	{
		$this->db->where($where);
		$this->db->update($table, $data);
		
	}

	public function get_user_by_id($id_petugas){
        $this->db->select('*');
        $this->db->from('petugas');
		$this->db->where('id_petugas', $id_petugas);

        return $this->db->get();
    }
}
