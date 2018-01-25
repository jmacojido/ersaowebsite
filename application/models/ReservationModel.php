<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ReservationModel extends MY_Model {
	protected $_table_name = 'reservation';
	protected $_primary_key = 'id';
	protected $_timestamps = true;
	public $rules = array();
	public static $_STATUS;
	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
		$this->InitStatus();
	}

	private function InitStatus(){
		self::$_STATUS['pending']['code'] = 'pending';
		self::$_STATUS['pending']['name'] = 'Pending';
		self::$_STATUS['rejected']['code'] = 'rejected';
		self::$_STATUS['rejected']['name'] = 'Rejected';
		self::$_STATUS['confirmed']['code'] = 'confirmed';
		self::$_STATUS['confirmed']['name'] = 'Confirmed';
		self::$_STATUS['cancelled']['code'] = 'cancelled';
		self::$_STATUS['cancelled']['name'] = 'Cancelled';
	}

	public function GetEventTypes(){
		$types = array();

		$types[] = 'Party Booth Package';
		$types[] = 'Event Space Package';

		return $types;
	}

	public function GetEventType($id){
		$id -= 1;

		if ( $id < 0 ){
			$id = 0;
		}

		$types = $this->getEventTypes();

		if ( isset($types[$id]) == FALSE ){
			return NULL;
		}

		return $types[$id];
	}

	public function GetPackageTypes(){
		$types = array();

		$types[] = 'Snacks and Drinks';
		$types[] = 'Snacks Only';
		$types[] = 'Drinks Only';

		return $types;
	}

	public function GetPackageType($id){
		$id -= 1;

		if ( $id < 0 ){
			$id = 0;
		}

		$types = $this->getPackageTypes();

		if ( isset($types[$id]) == FALSE ){
			return NULL;
		}

		return $types[$id];
	}

	public function InsertPartyEvent($date, $timeStart, $timeEnd, $name, $email, $contact, $pax, $package, $address, $ipAddress){
		if ( is_null($this->getPackageType($package)) == TRUE ){
			return FALSE;
		}

		$this->load->helper('string');

		$date = date_create_from_format('Y-m-d', $date);
		$dateStart = date_create_from_format('Y-m-d G:i', $date->format('Y-m-d').' '.$timeStart);
		$dateEnd = date_create_from_format('Y-m-d G:i', $date->format('Y-m-d').' '.$timeEnd);

		$queryStr = "INSERT INTO reservation VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NOW(), ?, ?)";

		$params[] = strtoupper(random_string('alnum', 10));
		$params[] = 1;
		$params[] = $date->format('Y-m-d');
		$params[] = $dateStart->format('H:i');
		$params[] = $dateEnd->format('H:i');
		$params[] = $name;
		$params[] = $email;
		$params[] = $contact;
		$params[] = $pax;
		$params[] = $package;
		$params[] = $address;
		$params[] = $ipAddress;
		$params[] = self::$_STATUS['pending']['code'];

		$query = $this->db->query($queryStr, $params);

		if ( $query == FALSE ){
			return NULL;
		}

		return $this->db->insert_id();
	}

	public function InsertReservationEvent($date, $timeStart, $timeEnd, $name, $email, $contact, $pax, $branchId, $ipAddress){
		$this->load->model('BranchModel');

		if ( $this->BranchModel->IsExisting($branchId) == FALSE ){
			return FALSE;
		}

		$this->load->helper('string');

		$date = date_create_from_format('Y-m-d', $date);
		$dateStart = date_create_from_format('Y-m-d G:i', $date->format('Y-m-d').' '.$timeStart);
		$dateEnd = date_create_from_format('Y-m-d G:i', $date->format('Y-m-d').' '.$timeEnd);

		$queryStr = "INSERT INTO reservation VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, ?, NOW(), ?, ?, ?)";
		$queryStr = "INSERT INTO reservation VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, NULL, NULL, ?, NOW(), ?, ?)";

		$params[] = strtoupper(random_string('alnum', 10));
		$params[] = 2;
		$params[] = $date->format('Y-m-d');
		$params[] = $dateStart->format('H:i');
		$params[] = $dateEnd->format('H:i');
		$params[] = $name;
		$params[] = $email;
		$params[] = $contact;
		$params[] = $pax;
		$params[] = $branchId;
		$params[] = $ipAddress;
		$params[] = self::$_STATUS['pending']['code'];

		$query = $this->db->query($queryStr, $params);

		if ( $query == FALSE ){
			return NULL;
		}

		return $this->db->insert_id();
	}
}
