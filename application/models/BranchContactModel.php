<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BranchContactModel extends MY_Model {
	protected $_table_name = 'branch_contact';
    protected $_primary_key = 'id';
    protected $_timestamps = true;
    public $rules = array();
	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}

	public function GetAreas(){
		$areas = array();

		$areas[0]['name'] = 'Manila';
		$areas[0]['code'] = 'manila';

		$areas[1]['name'] = 'Quezon City';
		$areas[1]['code'] = 'quezon_city';

		$areas[2]['name'] = 'North Area of Metro Manila';
		$areas[2]['code'] = 'north_area_of_metro_manila';

		$areas[3]['name'] = 'South Area of Metro Manila';
		$areas[3]['code'] = 'south_area_of_metro_manila';

		$areas[3]['name'] = 'Provincial';
		$areas[3]['code'] = 'provincial';

		return $areas;
	}

	public function GetAllBranches(){
		$queryStr = "SELECT id, name, address, latitude, longitude FROM branch ORDER BY name";

		$query = $this->db->query($queryStr);

		$branches = $query->result();

		foreach ( $branches AS $index => $branch ){
			$branchAssoc = json_decode(json_encode($branch), TRUE);

			$queryStr = "SELECT contact FROM branch_contact WHERE branch = ?";

			$params = array();
			$params[] = $branch->id;

			$query = $this->db->query($queryStr, $params);

			$results = $query->result();

			$branchContacts = array();

			foreach ( $results AS $row ){
				$branchContacts[] = $row->contact;
			}

			$branchAssoc['contacts'] = $branchContacts;
			$branches[$index] = json_decode(json_encode($branchAssoc));
		}

		return $branches;
	}

	public function GetBranchContacts(){
		$branches = $this->GetAllBranches();

		$contacts = array();

		foreach ( $branches AS $index => $branch ){
			$queryStr = "SELECT contact FROM branch_contact WHERE branch = ?";

			$params = array();
			$params[] = $branch->id;

			$query = $this->db->query($queryStr, $params);

			$results = $query->result();

			$branchContacts = array();

			foreach ( $results AS $row ){
				$branchContacts[] = $row->contact;
			}

			$contacts[$branch->id] = $branchContacts;
		}

		return $contacts;
	}

	public function GetAllBranchesByArea(){
		$areas = $this->getAreas();
		$branches = array();

		foreach ( $areas AS $area ){
			$queryStr = "SELECT * FROM branch WHERE area = ?";

			$params = array();
			$params[] = $area['code'];

			$query = $this->db->query($queryStr, $params);

			if ( $query->num_rows() < 1 ){
				continue;
			}

			$areaBranches = array();

			foreach ( $query->result() AS $row ){
				$areaBranches[] = $row;
			}

			$branches[$area['code']] = $areaBranches;
		}

		return $branches;
	}

	public function GetServiceTimes(){
		$times = array();

		$startHour = 8;
		$endHour = 20;
		$minutes = 0;
		$intervalMin = 30;


		for ( $ctr = $startHour; $ctr <= $endHour; $ctr++ ){
			if ( $ctr == $endHour && $minutes > 0 ){
				break;
			}

			$hour = $ctr;


			if ( $ctr < 12 ){
				$suffix = ' AM';
			}
			else{

				if ( $ctr > 12 ){
					$hour = $ctr-12;
				}

				$suffix = 'PM';
			}

			$code = $ctr.':'.str_pad($minutes, 2, '0', STR_PAD_LEFT);
			$timeStr = $hour .':'.str_pad($minutes, 2, '0', STR_PAD_LEFT).' '.$suffix;

			$minutes += $intervalMin;

			if ( $minutes >= 60 ){
				$minutes = 0;
			}
			else{
				$ctr = $ctr - 1;
			}

			$times[$code] = $timeStr;
		}

		return $times;
	}

	public function IsExisting($branchId){
		$queryStr = "SELECT id FROM branch WHERE id = ?";
		$params[] = $branchId;

		$query = $this->db->query($queryStr, $params);

		if ( $query->num_rows() == 0 ){
			return FALSE;
		}

		return TRUE;
	}
}
