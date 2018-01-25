<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
	}

	public function Menu($categoryCode = NULL){
		$this->load->model('MenuModel');

		if ( is_null($categoryCode) == TRUE ){
			$categoryCodes = $this->MenuModel->GetCategoryCodes();
			$categoryCode = $categoryCodes[0];
		}
		else if ( $this->MenuModel->IsValidCategoryCode($categoryCode) == FALSE ){
			return redirect(BASE_URL.'order/menu');
		}

		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['categoryCode'] = $categoryCode;
		$data['categories'] = $this->MenuModel->GetCategories();
		$data['menu'] = $this->MenuModel->GetItemsByCategory($categoryCode);

		$json['variations'] = $this->MenuModel->GetPriceListByCategory($categoryCode);

		$data['ngData'] = base64_encode(json_encode($json));

		$data['pageTitle'] = 'Menu | '.TITLE;
		$data['pageId'] = 'menu';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Order/menu.php', $data);
		$this->load->view('Order/cart.php', $data);
		$this->load->view('scripts/angular.menu.php', $data);
		$this->load->view('templates/footer.php');
	}

	/* public function Checkout(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Checkout | Order | '.TITLE;
		$data['pageId'] = 'menu';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Order/checkout.php', $data);
		$this->load->view('Order/cart.php', $data);
		$this->load->view('scripts/angular.menu.php', $data);
		$this->load->view('templates/footer.php');
	} */

	public function CheckoutCart(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$this->load->model('MenuModel');

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Checkout | Order | '.TITLE;
		$data['pageId'] = 'menu';

		$json['variations'] = $this->MenuModel->GetPriceList();
		$json['categories'] = $this->MenuModel->GetCategoryObjects();

		$data['ngData'] = base64_encode(json_encode($json));

		$this->load->view('templates/header.php', $data);
		$this->load->view('Order/checkout.php', $data);
		$this->load->view('Order/cart.php', $data);
		$this->load->view('scripts/angular.menu.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function Summary(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Order Summary | Order | '.TITLE;
		$data['pageId'] = 'menu';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Order/summary.php', $data);
		$this->load->view('Order/cart.php', $data);
		$this->load->view('scripts/angular.menu.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function Submit(){
		if ( $this->input->method() != 'post' ){
			return redirect(BASE_URL.'order/menu');
		}

		$this->load->library('user_agent');

		if ( $this->agent->referrer() != BASE_URL.'order/checkout/summary' ){
			return redirect(BASE_URL.'order/menu');
		}

		$variationIds = $this->input->post('variation_id[]');
		$quantityValues = $this->input->post('quantity[]');
		$inName = $this->input->post('e_name');
		$inEmail = $this->input->post('e_email');
		$inContact = $this->input->post('e_contact');
		$inBuilding = $this->input->post('e_building');
		$inStreet = $this->input->post('e_street');
		$inBarangay = $this->input->post('e_barangay');
		$inCity = $this->input->post('e_city');
		$inProvince = $this->input->post('e_province');
		$inZip = $this->input->post('e_zip');
		$inPayment = $this->input->post('e_payment');
		$ipAddress = $this->input->ip_address();

		if ( count($variationIds) != count($quantityValues) ){
			return redirect(BASE_URL.'order/menu');
		}

		$this->load->model('OrderModel');
		$this->load->database();
		$this->db->trans_start();

		$deliveryId = $this->OrderModel->InsertDelivery($inBuilding, $inStreet, $inBarangay, $inCity, $inProvince, $inZip, $inName, $inEmail, $inContact, $ipAddress);

		if ( $deliveryId === FALSE ){
			return redirect(BASE_URL.'order/menu');
		}

		if ( $this->OrderModel->InsertDeliveryItems($variationIds, $quantityValues, $deliveryId) == FALSE ){
			return redirect(BASE_URL.'order/menu');
		}

		$this->db->trans_complete();

		redirect(BASE_URL.'order/success');
	}

	public function Success(){
		$meta['title'] = TITLE;
		$meta['description'] = 'Ersao website.';
		$meta['image'] = IMG_URL.'ersao_meta.jpg';
		$meta['url'] = BASE_URL.uri_string();
		$meta['site'] = TITLE;

		$data['meta'] = $meta;
		$data['angular'] = TRUE;

		$data['pageTitle'] = 'Order Successful | Order | '.TITLE;
		$data['pageId'] = '';

		$this->load->view('templates/header.php', $data);
		$this->load->view('Order/success.php', $data);
		$this->load->view('scripts/angular.menu.php', $data);
		$this->load->view('templates/footer.php');
	}
}
