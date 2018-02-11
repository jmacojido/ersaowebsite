<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends MY_Model {
	protected $_table_name = 'user_accounts';
    protected $_timestamps = false;
    public $rules = array();

	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}

	function get_account($where){
		$this->db->select('user_accounts.id as id, user_accounts.role as role, user_accounts.validated as validated ,user_accounts.password as password ,user_accounts.validated as validated, user_info.firstname as fname, user_info.lastname as lname, user_accounts.email_address as email, user_info.date_of_birth as dob');
		$this->db->where($where);
		$this->db->join('user_infos as user_info', 'user_info.user_account_id = user_accounts.id', 'left');
		$user = $this->db->get($this->_table_name . ' as user_accounts')->row();
		return $user;
	}
}
