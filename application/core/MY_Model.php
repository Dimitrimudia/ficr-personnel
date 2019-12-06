<?php

class MY_Model extends CI_Model
{
        protected $_table_name = '';
	protected $_primary_key = '';
	protected $_primary_filter = 'intval';
	protected $_order_by = '';
	protected $_rules = array();
	protected $_timestamps = FALSE;
	protected $_date_created = '';
	protected $_date_modified = '';
	public $rules = array();
    
        public function __construct()
	{
		parent::__construct();
               
	}
        
        public function get_by($where, $single = FALSE)
        {
                $this->db->where($where);
                return $this->get_all(NULL, $single);
        }

        public function set_table($tbl, $primary, $orderby, $timestamp = FALSE, $date_created = NULL, $date_modified = NULL)
        {
                $this->_table_name = $tbl;
                $this->_primary_key = $primary;
                $this->_order_by = $orderby;
                $this->_date_created = $date_created;
                $this->_date_modified = $date_modified;
        }
        
        public function save($data, $id = NULL, $escape = TRUE)
	{
		//Set timestamps
		if($this->_timestamps == TRUE){
			$now = date('Y-m-d H:i:s');
			$id || $data[$this->_date_created] = $now;
			(empty($this->_date_modified)) || $data[$this->_date_modified] = $now;
		}

		//Insert
		if($id === NULL){
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;
			$this->db->set($data, '', $escape);
			$this->db->insert($this->_table_name);
			$id = $this->db->insert_id();
		}
		
		//Update
		else{
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->set($data, '', $escape);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $id;
	}
        
        public function get_all($id = NULL, $single = FALSE)
	{
		if($id != NULL){
			$filter = $this->_primary_filter;
			$id = $filter($id);
			$this->db->where($this->_primary_key, $id);
			if($single == TRUE) $method = 'row';
			else $method = 'result';
		}
		elseif($single == TRUE){
			$method = 'row';
		}
		else{
			$method = 'result';
		}
		
		if(!count($this->db->order_by($this->_order_by))){
			$this->db->order_by($this->_order_by);
		}
		//return $this->db->get($this->_table_name)->$method();
                return $this->db->get($this->_table_name)->$method();
	}
    
    
}

