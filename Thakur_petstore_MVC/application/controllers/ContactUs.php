<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactUs extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');

		$this->load->library('form_validation');

		$this->load->model('Insert_Model');

		// if ($this->input->post('submit')){

		$this->form_validation->set_rules('fname', 'Firstname', 'required|alpha');
		$this->form_validation->set_rules('lname', 'Lastname', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'numeric');
		$this->form_validation->set_rules('comments', 'Comments', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('ContactUs');
		}
		else
		{	
			$data = array(
				'fname' => $this->input->post('fname'), 
				'lname' => $this->input->post('lname'), 
				'email' => $this->input->post('email'),
				'phone' => $this->input->post('phone'),
				'comments' => $this->input->post('comments'),
			);
			$this->Insert_Model->contactus($data);
			$response['e_message'] = "Successfully added your enquiry!!!";

			$this->load->view('ContactUs', $response);
		}
	}
}
