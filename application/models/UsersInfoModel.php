<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersInfoModel extends MY_Model {
	protected $_table_name = 'user_infos';
    protected $_timestamps = false;
    public $rules = array();

	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}
}
