<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	function index(){
		redirect(BASE_URL.'admin/media');
	}
}
