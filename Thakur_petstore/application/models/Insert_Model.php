<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Insert_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function contactus($data){
		$sql = "INSERT INTO enquiries (fname, lname, phone, email, comments) VALUES ('".$data['fname']."', '".$data['lname']."', ".$data['phone'].", '".$data['email']."', '".$data['comments']."')";
		$this->db->query($sql);
	}

	public function client($data){
		$sql = "INSERT INTO users (email, password, roleid) VALUES ('".$data['email']."', 1234567, ".$data['roleid'].")";
		$this->db->query($sql);
		$id = $this->db->insert_id();
		
		$sql = "INSERT INTO clients (fname, lname, phone, email, userid) VALUES ('".$data['fname']."', '".$data['lname']."', ".$data['phone'].", '".$data['email']."', ".$id.")";
		$this->db->query($sql);
	}

	public function service($data){
		$sql = "INSERT INTO users (email, password, roleid) VALUES ('".$data['email']."', 1234567, ".$data['roleid'].")";
		$this->db->query($sql);
		$id = $this->db->insert_id();
		
		$sql = "INSERT INTO clients (fname, lname, phone, email, userid) VALUES ('".$data['fname']."', '".$data['lname']."', ".$data['phone'].", '".$data['email']."', ".$id.")";
		$this->db->query($sql);
	}
}