<?php

class Model_periode extends CI_Model {

	public function get_periode(){
        $this->db->select('*');
        $this->db->from('periode');

        return $this->db->get();
    }
}
