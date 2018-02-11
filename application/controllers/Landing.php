<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function Page(){
		$this->load->model('BranchModel');
		$this->load->model('FacebookModel');
		$this->load->model('MediaModel');

		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['branches_all'] = $this->BranchModel->GetAllBranches();
		$data['ngData']['branches_all'] = $data['branches_all'];

		$data['pageTitle'] = TITLE;
		$data['pageId'] = 'home';

		$data['areas'] = $this->BranchModel->getAreas();
		$data['branches'] = $this->BranchModel->getAllBranchesByArea();
		$data['times'] = $this->BranchModel->getServiceTimes();

		$data['image_carousel'] = $this->MediaModel->get_image_carousel();

		$this->load->view('templates/header.php', $data);
		$this->load->view('Landing/landing.php', $data);
		$this->load->view('scripts/owl.php');
		$this->load->view('scripts/owl.landing.php');
		$this->load->view('scripts/angular.app.php');
		$this->load->view('scripts/angular.home.php');
		$this->load->view('scripts/owl.events.php');
		$this->load->view('scripts/icheck.php');
		$this->load->view('scripts/icheck.events.php');
		$this->load->view('scripts/facebook.page.php');
		$this->load->view('scripts/gmaps.php');
		$this->load->view('templates/footer.php');
	}
}
