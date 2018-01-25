<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MediaModel extends MY_Model {
	protected $_table_name = 'media_gallery';
    protected $_primary_key = 'id';
    protected $_timestamps = true;
    public $rules = array();

	function get_image_in_order($where,$order_by){
		$this->db->where($where);
		$this->db->order_by($order_by, 'ASC');
        return $this->get(null, false);
	}

	function get_image_carousel(){
		$where = array('type' => 'image_slider');
		$this->db->where($where);
		return $this->get(null, false);
	}
}
