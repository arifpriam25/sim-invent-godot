<?php

class Data_Mobil extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_CarType');
		$this->load->model('M_RequiredParts');

		if ($this->session->userdata('role_id') != '1') {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Anda Belum Login!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('login');
		}
	}

	public function index()
	{
		$data['title'] = "Data Mobil";
		$data['list'] = $this->M_CarType->get_data();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/list_mobil', $data);
		$this->load->view('template_admin/footer');
	}

	public function required_parts($id)
	{

		$result = $this->M_CarType->findById($id);
		$carName = $result[0]->name;

		$parts = $this->M_RequiredParts->findByCarType($carName);


		$data['title'] = "Required Parts Mobil - ";
		$data['carName'] = $carName;
		$data['list'] = $parts;

		// print_r($data['carName']);
		// die();


		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/car/required_parts', $data);
		$this->load->view('template_admin/footer');
	}





	
	public function tambah_data()
	{
		$data['title'] = "Tambah Mobil";

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/tambah_dataJabatan', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data($id)
	{
		$where = array('id_jabatan' => $id);
		$data['jabatan'] = $this->db->query("SELECT * FROM data_jabatan WHERE id_jabatan= '$id'")->result();
		$data['title'] = "Update Data Jabatan";

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/jabatan/update_dataJabatan', $data);
		$this->load->view('template_admin/footer');
	}


	public function delete_data($id)
	{
		$where = array('id_jabatan' => $id);
		$this->M_User->delete_data($where, 'data_jabatan');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('admin/data_jabatan');
	}
}
