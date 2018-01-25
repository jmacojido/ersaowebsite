<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promos extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function Page(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;

		$data['pageTitle'] = 'Promos | '.TITLE;
		$data['pageId'] = 'promos';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Promos/promos.php', $data);
		$this->load->view('templates/footer.php');
	}
}
