<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
*
*/
class MY_Model extends CI_Model
{

    protected $_table_name = '';
    protected $_primary_key = 'id';
    protected $_timestamps = false;
    public $rules = array();


    function get($id = null, $single = false){
        if($id !== NULL && $single === false){
            $this->db->where($this->_primary_key, $id);
            $method = 'result';
        }else if($id !== NULL && $single === true){
            $this->db->where($this->_primary_key, $id);
            $method = 'row';
        }else if($single === true){
            $method = 'row';
        }else{
            $method = 'result';
        }
        return $this->db->get($this->_table_name)->$method();
    }

	function get_array(){
		$this->db->select('*');
		return $this->db->get($this->_table_name)->result_array();
	}


    function get_by($where, $single = false){
        $this->db->where($where);
        return $this->get(null, $single);
    }

    function save($data, $id = null){

        $now = date('Y-m-d H:i:s');
        if($id !== NULL){
            //update
            if($this->_timestamps){
            $data['date_modified'] = $now;
            }
            $this->db->where($this->_primary_key, $id);
            $this->db->set($data);
            $this->db->update($this->_table_name);
        }else{
            // insert
            if($this->_timestamps){
                $data['date_inserted'] = $now;
            }
            $this->db->set($data);
            $this->db->insert($this->_table_name);
            return $this->db->insert_id();
        }

    }


    function delete($id){
        $this->db->where($this->_primary_key, $id);
        return $this->db->delete($this->_table_name);
    }


    function get_count(){
        $this->db->select('count(*) as n');
        $products = $this->db->get($this->_table_name)->row();
        return $products->n;
    }

}
