<?php

class M_Inventory extends CI_model
{

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from('inventory');
		return $this->db->get()->result();
	}

	public function findByStatus($data)
	{
		$this->db->where('username', $this->session->userdata('username'));
		$this->db->where('status', $data);
		$this->db->from('inventory');
		return $this->db->get()->result();
	}

	public function insertData($data)
	{
		$this->db->insert('inventory', $data);
	}

	//Panggil Supplier
	public function getOldestData()
	{
		$this->db->select('*');
		$this->db->from('inventory');
		$this->db->order_by('updated_at', 'asc');
		$this->db->limit(30);
		$this->db->where('status', 'SPR');
		return $this->db->get()->result();
	}

	public function updateById($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('inventory', $data);
	}

	public function forSendParts($car_model, $parts_name, $limit)
	{
		$this->db->from('inventory');
		$this->db->order_by('updated_at', 'asc');
		$this->db->where('car_model', $car_model);
		$this->db->where('parts_name', $parts_name);
		$this->db->where('status', 'SOH');
		$this->db->limit($limit);
		return $this->db->get()->result();
	}













	public function delete_data($whare, $table)
	{
		$this->db->where($whare);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if ($jumlah > 0) {
			$this->db->insert_batch($table, $data);
		}
	}
}
