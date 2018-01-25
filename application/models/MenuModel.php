<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuModel extends MY_Model {
	protected $_table_name = 'menu_entry';
    protected $_primary_key = 'id';
    protected $_timestamps = true;
    public $rules = array();

	function __construct(){
		$this->load->database();
		$this->db->query("SET time_zone = '+8:00'");
	}

	public function GetCategories(){
		$categories = array();

		$categories['taiwan_snack'] = 'Taiwan Snack';
		$categories['side_dish'] = 'Side Dish';
		$categories['rice_toppings'] = 'Rice Toppings';
		$categories['noodles'] = 'Noodles';
		$categories['milk_tea'] = 'Milk Tea';
		$categories['blended_green_tea'] = 'Blended Green Tea';
		$categories['freshly_brewed_tea'] = 'Freshly Brewed Tea';
		$categories['special_beverages'] = 'Special Beverages';
		$categories['fresh_fruit_shakes'] = 'Fresh Fruit Shakes';
		$categories['shake_float'] = 'Shake Float';

		return $categories;
	}

	public function GetCategoriesTaiwan(){
		$categories = array();

		$categories['taiwan_snack'] = '台灣小吃';
		$categories['side_dish'] = '小菜';
		$categories['rice_toppings'] = '套飯';
		$categories['noodles'] = '湯麵';
		$categories['milk_tea'] = '奶茶';
		$categories['blended_green_tea'] = '綠茶';
		$categories['freshly_brewed_tea'] = '現泡茶';
		$categories['special_beverages'] = '特調飮品';
		$categories['fresh_fruit_shakes'] = '冰沙';
		$categories['shake_float'] = '飄浮冰沙';

		return $categories;
	}

	public function GetCategoryObjects(){
		$categories = $this->GetCategories();
		$categoriesTaiwan = $this->GetCategoriesTaiwan();
		$objects = array();

		foreach ( $categories AS $code => $category ){
			$objects[] = [
				'code' => $code,
				'name' => $category,
				'name_taiwan' => $categoriesTaiwan[$code]
			];
		}

		return $objects;
	}

	public function GetCategoryCodes(){
		$categories = $this->GetCategories();
		$codes = array();

		foreach ( $categories AS $code => $category ){
			$codes[] = $code;
		}

		return $codes;
	}

	public function IsValidCategoryCode($categoryCode){
		$categories = $this->GetCategories();

		if ( isset($categories[$categoryCode]) == FALSE ){
			return FALSE;
		}

		return TRUE;
	}

	public function GetItemsByCategory($categoryCode){
		if ( $this->IsValidCategoryCode($categoryCode) == FALSE ){
			return FALSE;
		}

		$queryStr = "SELECT * FROM menu_entry WHERE category = ? ORDER BY name";

		$params[] = $categoryCode;

		$query = $this->db->query($queryStr, $params);

		$this->GetVariationsByCategory($categoryCode);

		return $query->result();
	}

	public function GetVariationsByCategory($categoryCode){
		if ( $this->IsValidCategoryCode($categoryCode) == FALSE ){
			return FALSE;
		}

		$queryStr = "SELECT m_e_v.id AS id, type, size, price, menu_entry AS entry_id FROM menu_entry_variation AS m_e_v
			INNER JOIN menu_entry AS m_e ON menu_entry = m_e.id
			WHERE category = ?";

		$params = array();
		$params[] = $categoryCode;

		$query = $this->db->query($queryStr, $params);

		return $query->result();
	}

	public function GetVariations(){
		$queryStr = "SELECT m_e_v.id AS id, name, name_taiwan, category, type, size, price, menu_entry AS entry_id FROM menu_entry_variation AS m_e_v
			INNER JOIN menu_entry AS m_e ON menu_entry = m_e.id";

		$query = $this->db->query($queryStr);

		return $query->result();
	}

	public function GetPriceListByCategory($categoryCode){
		$variations = $this->GetVariationsByCategory($categoryCode);

		return $variations;
	}

	public function GetPriceList(){
		$variations = $this->GetVariations();

		return $variations;
	}

	public function GetVariationById($variationId){
		$queryStr = "SELECT m_e_v.id AS id, m_e_v.menu_entry AS menu_entry, type, size, price, name, name_taiwan, category, category_taiwan
			FROM menu_entry_variation AS m_e_v
			INNER JOIN menu_entry AS m_e ON m_e_v.menu_entry = m_e.id
			WHERE m_e_v.id = ?";

		$params = array();
		$params[] = $variationId;

		$query = $this->db->query($queryStr, $params);

		if ( $query->num_rows() == 0 ){
			return NULL;
		}

		return $query->row();
	}
	public function get_menu_varation($id){
		$this->db->select(['a.id as id', 'a.type as type', 'a.size as size','a.price as price','b.id as menu_entry']);
    	$this->db->join('menu_entry b', 'b.id = a.menu_entry');
    	$this->db->where(['b.id'=>$id]);
    	//$this->db->order_by("a.id", "asc");
    	$query = $this->db->get('menu_entry_variation a');
		return $query->result_array();

	}
	function get_last_record(){
		$queryStr = "SELECT * FROM menu_entry ORDER BY id desc LIMIT 1";
		$query = $this->db->query($queryStr);
		return $query->row();
	}
}
