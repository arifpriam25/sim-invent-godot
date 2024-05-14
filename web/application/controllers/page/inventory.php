<?php

class inventory extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_CarType');
		$this->load->model('M_RequiredParts');
		$this->load->model('M_Inventory');

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

	public function data_spr()
	{
		$data['title'] = "Spare Part Request";
		$data['list'] = $this->M_Inventory->findByStatus('SPR');
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/inventory/spr', $data);
		$this->load->view('template_admin/footer');
	}

	public function data_soh()
	{
		$data['title'] = "Stock On Hand";
		$data['list'] = $this->M_Inventory->findByStatus('SOH');
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/inventory/soh', $data);
		$this->load->view('template_admin/footer');
	}

	public function data_sit()
	{
		$data['title'] = "Stock in Transit";
		$data['list'] = $this->M_Inventory->findByStatus('SIT');
		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/inventory/sit', $data);
		$this->load->view('template_admin/footer');
	}

	public function req_car()
	{
		$data['title'] = "Request Car";
		$data['list_car'] = $this->M_CarType->get_data();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/inventory/request_car', $data);
		$this->load->view('template_admin/footer');
	}

	public function send_parts()
	{
		$data['title'] = "Kirim Parts ke Manufacture";
		$data['list_car'] = $this->M_CarType->get_data();

		$this->load->view('template_admin/header', $data);
		$this->load->view('template_admin/sidebar');
		$this->load->view('page/inventory/send_parts', $data);
		$this->load->view('template_admin/footer');
	}
}
