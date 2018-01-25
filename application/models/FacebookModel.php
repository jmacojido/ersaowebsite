<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once($_SERVER['DOCUMENT_ROOT']. '/plugins/Facebook/autoload.php');

class FacebookModel extends CI_Model {
	private $appToken = '';

	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}
}