<?php

class M_User extends CI_model{

	public function getUser() {
		$this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
	}

	public function insert_data($data,$table){
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

	public function cek_login()
	{
		$username = set_value('username');
		$password = set_value('password');

		$result = $this->db->where('username',$username)
							->where('password',md5($password))
							->limit(1)
							->get('user');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return FALSE;
		}
	}
}

?>