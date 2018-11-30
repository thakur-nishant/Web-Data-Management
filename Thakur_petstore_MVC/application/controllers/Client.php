<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {

	public function index()
	{	
		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->model('Insert_Model');

		// if ($this->input->post('submit')){

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('phone', 'Phone', 'numeric');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('Client');
		}
		else
		{	
			$data = array(
				'fname' => $this->input->post('fname'), 
				'lname' => $this->input->post('lname'), 
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'bname' => $this->input->post('bname'),
				'roleid' => 1
			);
			$this->Insert_Model->client($data);
			echo "Successfully inserted data!!";
			redirect(base_url());
		}
	}
}
