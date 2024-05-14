<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE) {
			$this->load->view('login');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->M_User->cek_login($username, $password);

			

			if($cek == FALSE)
			{	
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Username atau Password Salah!</strong>
				</button>
				</div>');
				redirect('login');
			} 

			if($cek->is_active == 0)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<strong>Account Inactive!</strong>
				</button>
				</div>');
				redirect('login');
			}
			
			$this->session->set_userdata('role_id',$cek->role_id);
			$this->session->set_userdata('name',$cek->name);
			$this->session->set_userdata('username',$cek->username);
			$this->session->set_userdata('id',$cek->id);
			switch ($cek->role_id) {
				case 1 : redirect('admin/dashboard');
					break;
				case 2 : redirect('pegawai/dashboard');
					break;
				default:
					break;
			}
			
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Login');
	}
}
