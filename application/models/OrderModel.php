<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class OrderModel extends CI_Model {
	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}

	public function InsertDelivery($building, $street, $barangay, $city, $province, $zip, $name, $email, $contact, $ipAddress){
		$this->load->helper('string');

		$queryStr = "INSERT INTO delivery VALUES(NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?)";

		$params = array();
		$params[] = strtoupper(random_string('alnum', 20));
		$params[] = $building;
		$params[] = $street;
		$params[] = $barangay;
		$params[] = $city;
		$params[] = $province;
		$params[] = $zip;
		$params[] = $name;
		$params[] = $email;
		$params[] = $contact;
		$params[] = $ipAddress;
		$params[] = 'pending';

		$query = $this->db->query($queryStr, $params);

		if ( $query == FALSE ){
			return FALSE;
		}

		return $this->db->insert_id();
	}

	public function InsertDeliveryItems($variationIds, $quantityValues, $deliveryId){
		$this->load->model('MenuModel');

		$queryStr = "INSERT INTO delivery_item VALUES ";

		$queryValues = array();
		$params = array();

		foreach ( $variationIds AS $index => $variationId ){
			$quantity = $quantityValues[$index];

			if ( is_numeric($quantity) == FALSE || is_numeric($variationId) == FALSE ){
				continue;
			}

			if ( $quantity < 1 ){
				continue;
			}

			$variation = $this->MenuModel->GetVariationById($variationId);

			if ( is_null($variation) == TRUE ){
				continue;
			}

			$queryValues[] = "(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

			$params[] = $deliveryId;
			$params[] = $variation->id;
			$params[] = $variation->name;
			$params[] = $variation->name_taiwan;
			$params[] = $variation->category;
			$params[] = $variation->category_taiwan;
			$params[] = $variation->type;
			$params[] = $variation->size;
			$params[] = $quantity;
			$params[] = $variation->price;
		}

		$queryStr .= implode(',', $queryValues);

		$query = $this->db->query($queryStr, $params);

		if ( $query == FALSE ){
			return FALSE;
		}

		return TRUE;
	}
}