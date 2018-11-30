<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{	
		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->model('Login_Model');

		$this->load->library('session');

		// if ($this->input->post('submit')){

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == FALSE)
		{	
			$this->load->view('Login');
		}
		else
		{	
			$data = array(
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password')
			);
			$result = $this->Login_Model->login($data);

			if ($result){
				if($result == 1){
					$this->client_login();
				}
				else{
					$this->business_login();
				}	
			}
			else {
				$response['e_message'] = "Unsuccessful! please check email and password!";

				$this->load->view('Login', $response);
			}
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function client_login(){
		$this->load->view('Client_login');
	}

	public function business_login(){
		$this->load->view('Business_login');
	}
}
