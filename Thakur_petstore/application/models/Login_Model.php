<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function login($data){
		$query = $this->db->get_where('users', array('email' => $data['email'], 'password' => $data['password']), 1);

		foreach ($query->result() as $row)
		{
	        $userid = $row->userid;
	        $roleid = $row->roleid;
		}
		if(!isset($userid)){
			return 0;
		}
		$query = $this->db->get_where('clients', array('email' => $data['email'], 'userid' => $userid), 1);
		foreach ($query->result() as $row)
		{
	        $fname = $row->fname;
	        $lname = $row->lname;
		}
		$new_session = array(
			'fname' => $fname, 
			'lname' => $lname, 
			'email' => $data['email'], 
			'userid' => $userid, 
			'roleid' => $roleid
		);
		$this->session->set_userdata($new_session);

		return $roleid;
	}

}