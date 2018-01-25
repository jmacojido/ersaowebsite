<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ContactModel extends CI_Model {
	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}

	public function InsertContact($name, $email, $message, $ipAddress){
		$this->load->helper('string');

		$queryStr = "INSERT INTO contact VALUES(NULL, ?, ?, ?, ?, ?, NOW())";

		$params = array();
		$params[] = strtoupper(random_string('alnum', 30));
		$params[] = $name;
		$params[] = $email;
		$params[] = $message;
		$params[] = $ipAddress;

		$query = $this->db->query($queryStr, $params);

		if ( $query == FALSE ){
			return FALSE;
		}

		return TRUE;
	}
}