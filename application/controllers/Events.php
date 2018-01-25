<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Events extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function Page(){
		$this->load->model('BranchModel');

		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Events | '.TITLE;
		$data['pageId'] = 'events';

		$data['areas'] = $this->BranchModel->getAreas();
		$data['branches'] = $this->BranchModel->getAllBranchesByArea();
		$data['times'] = $this->BranchModel->getServiceTimes();

		$this->load->view('templates/header.php', $data);
		$this->load->view('Events/events.php', $data);
		$this->load->view('Events/reservation.php', $data);
		$this->load->view('scripts/owl.php');
		$this->load->view('scripts/owl.events.php');
		$this->load->view('scripts/icheck.php');
		$this->load->view('scripts/icheck.events.php');
		$this->load->view('scripts/angular.reservation.php');
		$this->load->view('templates/footer.php');
	}

	public function Success(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;

		$data['pageTitle'] = 'Reservation Successful | Events | '.TITLE;
		$data['pageId'] = 'reservation';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Events/success.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function Reservation(){
		$this->load->model('BranchModel');

		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;
		$data['pageTitle'] = 'Reservation | Events | '.TITLE;
		$data['pageId'] = 'events';

		$data['areas'] = $this->BranchModel->GetAreas();
		$data['branches'] = $this->BranchModel->GetAllBranchesByArea();
		$data['times'] = $this->BranchModel->GetServiceTimes();

		$this->load->view('templates/header.php', $data);
		$this->load->view('Events/reservation.php', $data);
		$this->load->view('scripts/owl.php');
		$this->load->view('scripts/owl.events.php');
		$this->load->view('scripts/icheck.php');
		$this->load->view('scripts/icheck.events.php');
		$this->load->view('scripts/angular.reservation.php');
		$this->load->view('templates/footer.php');
	}

	public function Submit(){
		if ( $this->input->post('revent') == 1 ){
			$this->SubmitPartyEvent();
		}
		else if ( $this->input->post('revent') == 2){
			$this->SubmitEvent();
		}
		else{
			redirect(BASE_URL);
		}
	}

	private function SubmitPartyEvent(){
		$this->load->model('ReservationModel');

		$inputs = $this->input->post();

		$inDate = trim($inputs['rdate']);
		$inStart = trim($inputs['rtimestart']);
		$inEnd = trim($inputs['rtimeend']);
		$inName = trim($inputs['rname']);
		$inEmail = trim($inputs['remail']);
		$inContact = trim($inputs['rcontact']);
		$inPax = trim($inputs['rpax']);
		$inPackage = trim($inputs['rpackage']);
		$inAddress = trim($inputs['raddress']);
		$ipAddress = $this->input->ip_address();

		$reservationId = $this->ReservationModel->InsertPartyEvent($inDate, $inStart, $inEnd, $inName, $inEmail, $inContact, $inPax, $inPackage, $inAddress, $ipAddress);

		if ( is_null($reservationId) == TRUE ){
			return redirect(BASE_URL.'events/reservation?status=0');
		}

		if ( $reservationId == FALSE ){
			return redirect(BASE_URL.'events/reservation?status=2');
		}

		return redirect(BASE_URL.'events/reservation/success');
	}

	private function SubmitEvent(){
		$this->load->model('ReservationModel');

		$inputs = $this->input->post();

		$inDate = trim($inputs['rdate']);
		$inStart = trim($inputs['rtimestart']);
		$inEnd = trim($inputs['rtimeend']);
		$inName = trim($inputs['rname']);
		$inEmail = trim($inputs['remail']);
		$inContact = trim($inputs['rcontact']);
		$inPax = trim($inputs['rpax']);
		$inBranchId = trim($inputs['rbranch']);
		$ipAddress = $this->input->ip_address();

		$reservationId = $this->ReservationModel->InsertReservationEvent($inDate, $inStart, $inEnd, $inName, $inEmail, $inContact, $inPax, $inBranchId, $ipAddress);

		if ( is_null($reservationId) == TRUE ){
			return redirect(BASE_URL.'events/reservation?status=0');
		}

		if ( $reservationId == FALSE ){
			return redirect(BASE_URL.'events/reservation?status=2');
		}

		return redirect(BASE_URL.'events/reservation/success');
	}
}
