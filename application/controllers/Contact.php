<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function Success(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Inquiry Successful | Contact | '.TITLE;
		$data['pageId'] = '';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Contact/success.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function Submit(){
		if ( $this->input->method() != 'post' ){
			return redirect(BASE_URL);
		}

		$this->load->library('user_agent');

		if ( $this->agent->referrer() != BASE_URL ){
			return redirect(BASE_URL);
		}

		$inName = $this->input->post('e_name');
		$inEmail = $this->input->post('e_email');
		$inMessage = $this->input->post('e_message');
		$ipAddress = $this->input->ip_address();

		$this->load->model('ContactModel');

		$contactSuccess = $this->ContactModel->InsertContact($inName, $inEmail, $inMessage, $ipAddress);

		if ( $contactSuccess == FALSE ){
			return redirect(BASE_URL);
		}

		redirect(BASE_URL.'contact/success');
	}
}
