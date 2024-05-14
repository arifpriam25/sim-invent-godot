<?php

class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('M_CarType');
		$this->load->model('M_RequiredParts');
		$this->load->model('M_Inventory');


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
		$user = $this->M_User->getUser();
		$spr = $this->M_Inventory->findByStatus('SPR');
		$soh = $this->M_Inventory->findByStatus('SOH');
		$us = $this->M_Inventory->findByStatus('US');

		
		$data['title'] = "Dashboard";
		$data['users'] = count($user);
		$data['spr'] = count($spr);
		$data['soh'] = count($soh);
		$data['us'] = count($us);


		$this->load->view('template_admin/header',$data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template_admin/footer');
	}
}

?>