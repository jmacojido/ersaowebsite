<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuVarationModel extends MY_Model {
	protected $_table_name = 'menu_entry_variation';
    protected $_primary_key = 'id';
    protected $_timestamps = true;
    public $rules = array();


}
