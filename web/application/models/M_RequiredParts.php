<?php

class M_RequiredParts extends CI_model{

	public function get_data() {
		$this->db->select('*');
        $this->db->from('required_parts');
        return $this->db->get()->result();
	}

	public function findByCarType($data) {
		$this->db->where('car_type', $data);
        $this->db->from('required_parts');
        return $this->db->get()->result();
	}

	public function insert_data($data){
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $whare){
		$this->db->update($table, $data, $whare);
	}

	public function delete_data($whare,$table){
		$this->db->where($whare);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array()) {
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}
}

?>