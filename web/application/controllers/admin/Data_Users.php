<?php

class Data_Users extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
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
		$data['title'] = "Data Users";
		$data['users'] = $this->M_User->getUser('user');

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/users/data_users', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data() 
	{
		$data['title'] = "Tambah Data User";
		// $data['jabatan'] = $this->M_User->get_data('data_jabatan')->result();
		
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/users/tambah_dataUsers', $data);
		$this->load->view('template_admin/footer');
	}

	public function tambah_data_aksi() {
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->tambah_data();
		} else {
			$name = $this->input->post('name');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$is_active = $this->input->post('is_active');
			$role_id = $this->input->post('role_id');

			$data = array(
				'name' 	=> $name,
				'username' => $username,
				'password' => $password,
				'is_active' => $is_active,
				'role_id' => $role_id,
				'created_at' => date('Y-m-d H:i:s'),
			);

			$this->M_User->insert_data($data, 'user');
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil ditambahkan!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/data_users');
		}

	}

	public function update_data($id) 
	{
		$where = array('id_pegawai' => $id);
		$data['title'] = "update Data Pegawai";
		$data['jabatan'] = $this->M_User->get_data('data_jabatan')->result();
		$data['pegawai'] = $this->db->query("SELECT * FROM user WHERE id_pegawai='$id'")->result();
		
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/users/update_dataUsers', $data);
		$this->load->view('template_admin/footer');
	}

	public function update_data_aksi() {
		$this->_rules();

		if($this->form_validation->run() == FALSE) {
			$this->update_data($id);
		} else {
			$id				= $this->input->post('id_pegawai');
			$nik			= $this->input->post('nik');
			$nama_pegawai	= $this->input->post('nama_pegawai');
			$username		= $this->input->post('username');
			$password		= md5($this->input->post('password'));
			$jenis_kelamin	= $this->input->post('jenis_kelamin');
			$jabatan		= $this->input->post('jabatan');
			$tanggal_masuk	= $this->input->post('tanggal_masuk');
			$status			= $this->input->post('status');
			$role_id		= $this->input->post('role_id');
			$photo			= $_FILES['photo']['name'];
			if($photo){
				$config['upload_path'] 		= './photo';
				$config['allowed_types'] 	= 'jpg|jpeg|png|tiff';
				$config['max_size']			= 	2048;
				$config['file_name']		= 	'pegawai-'.date('ymd').'-'.substr(md5(rand()),0,10);
				$this->load->library('upload',$config);
				if($this->upload->do_upload('photo')){
					$photo=$this->upload->data('file_name');
					$this->db->set('photo',$photo);
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nama_pegawai' => $nama_pegawai,
				'username' => $username,
				'password' => $password,
				'tanggal_masuk' => $tanggal_masuk,
				'status' => $status,
				'role_id' => $role_id,
			);

			$where = array(
				'id_pegawai' => $id

			);

			$this->M_User->update_data('user', $data, $where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success alert-dismissible fade show" role="alert">
				<strong>Data berhasil diupdate!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/user');
		}
	}

	public function _rules() {
		$this->form_validation->set_rules('name','Nama','required');
		$this->form_validation->set_rules('role_id','Role id','required');
		$this->form_validation->set_rules('is_active','Status','required');
	}

	public function delete_data($id) {
		$where = array('id_pegawai' => $id);
		$this->M_User->delete_data($where, 'user');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Data berhasil dihapus!</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
				</div>');
			redirect('admin/user');
	}
}
?>