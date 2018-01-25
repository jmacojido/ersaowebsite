<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}

	public function BranchImport(){
		if (($handle = fopen("branch.csv", "r")) !== FALSE) {

			$ctr = 0;

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	$name = trim($data[1]);
		    	$address = trim($data[2]);
		    	$area = trim(strtolower($data[0]));

		    	$queryStr = "INSERT INTO branch VALUES (NULL, ?, ?, ?)";

		    	$params = array();
		    	$params[] = $name;
		    	$params[] = $address;
		    	$params[] = $area;

		    	$query = $this->db->query($queryStr, $params);

		    	$branchId = $this->db->insert_id();

		    	$contacts = explode('|', $data[3]);

		    	foreach( $contacts AS $contact ){
		    		$contact = trim($contact);

		    		$queryStr = "INSERT INTO branch_contact VALUES (?, ?)";

		    		$params = array();
			    	$params[] = $branchId;
			    	$params[] = $contact;

			    	$query = $this->db->query($queryStr, $params);
		    	}

		    	echo '<br/>';


		    	$ctr++;
		    }

		    echo $ctr;

		    fclose($handle);
		}
	}

	public function MenuImport(){
		if (($handle = fopen("menu.csv", "r")) !== FALSE) {

			$ctr = 0;

		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		    	$category = ucwords(trim($data[0]));
		    	$categoryTaiwan = trim($data[1]);
		    	$name = trim($data[2]);
		    	$nameTaiwan = trim($data[3]);
		    	$type = str_replace('/', ' / ', trim($data[4]));
		    	$size = trim($data[5]);

		    	if ( substr_count($size, 'mL') == 0 ){
		    		$size = strtolower($size);
		    	}

		    	$price = trim($data[6]);

		    	$queryStr = "INSERT INTO menu VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";

		    	$params = array();
		    	$params[] = $name;
		    	$params[] = $nameTaiwan;
		    	$params[] = $type;
		    	$params[] = $size;
		    	$params[] = strtolower(str_replace(' ', '_', $category));
		    	$params[] = $categoryTaiwan;
		    	$params[] = $price;

		    	$query = $this->db->query($queryStr, $params);
		    	$ctr++;
		    }

		    echo $ctr;

		    fclose($handle);
		}
	}
}
