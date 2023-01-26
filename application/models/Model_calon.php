<?php

class Model_calon extends CI_Model {

	public function get_dataKuis($where){
        $this->db->select('*');
        $this->db->from('detail_periode');
        $this->db->join('periode', 'periode.id_periode=detail_periode.id_periode');
        $this->db->join('penerima_bantuan', 'penerima_bantuan.id_penerima_bantuan=detail_periode.id_penerima_bantuan');
        $this->db->where($where);
        return $this->db->get();
    }

	public function kuis($where){
        $this->db->select('*');
        $this->db->from('kuisioner');
        $this->db->join('detail_periode', 'detail_periode.id_detail_periode=kuisioner.id_detail_periode');
        $this->db->where($where);
        return $this->db->get();
    }

	public function tampil_detail($where){
        $this->db->select('*');
        $this->db->from('detail_periode');
        $this->db->join('periode', 'periode.id_periode=detail_periode.id_periode');
        $this->db->join('penerima_bantuan', 'penerima_bantuan.id_penerima_bantuan=detail_periode.id_penerima_bantuan');
        $this->db->where($where);
        return $this->db->get();
    }
}
