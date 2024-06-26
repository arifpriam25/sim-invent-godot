<?php

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('role_id') != '2'){
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
		$data['title'] = "Dashboard";
		$id=$this->session->userdata('id_pegawai');
		$data['pegawai'] = $this->db->query("SELECT * FROM user WHERE id_pegawai='$id'")->result();

		$this->load->view('template_user/header',$data);
		$this->load->view('template_user/sidebar');
		$this->load->view('pegawai/dashboard', $data);
		$this->load->view('template_user/footer');
	}
}

?>