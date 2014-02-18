<?php

class MY_Model extends CI_Model {

	//@var string $_table_name Database table name
	protected $_table_name = '';

	//@var string $_primery_key Primery key field
	protected $_primery_key = 'id';

	//@var string $_primery_filter Filter method for a primery key
	protected $_primery_filter = 'intval';

	//@var string $_order_by Default ordering
	protected $_order_by = '';

	//@var array $_rules The validation rules
	protected $_rules = array();

	//@var boolean $_timestamps Requed or not timestamps field
	protected $_timestamps = FALSE;

	public function __construct() {
    	parent::__construct();
	}

	/*
	* Method returns all records ordered by default order field
	*
	* @return array
	*/
	public function get_all()
	{
		// Set default ordering
		$this->db->order_by($this->_order_by);

		// Fetch all records
		return $this->db->get($this->_table_name)->result();
	}

	/*
	* Returns one record by primery key
	*
	* @param integer $id Primery key
	* @return array
	*/
	public function get($id)
	{		
		// Find by primery key condition
		$this->db->where($this->_primery_key, filter($id));

		// Fetch one row
		return $this->db->get($this->_table_name)->row();
	}

	/*
	* Proccess value by filter method
	*
	* @param ? $value Value that we pass to filter
	* @return function
	*/
	public function filter($value)
	{
		// Detect primery key filter
		$filter = $this->_primery_filter;

		return $filter($value);
	}

	/*
	* Returns records by condition
	*
	* @param string $where Where condition
	* @return array
	*/
	public function get_by($where)
	{
		$this->db->where($where);

		return $this->db->get($this->_table_name)->result();
	}

	/*
	* Returns one record by where condition
	*
	* @param string $where Where condition
	* @return object
	*/
	public function get_one_by($where)
	{
		// Pass where condition to query 
		$this->db->where($where);

		// Fetch one object
		return $this->db->get($this->_table_name)->row();
	}

	public function __call($method, $arguments)
	{

	}

	/*
	* Create or update one record in db
	*
	* @param array $data Query data
	* @param ? $id Primery key
	* @return integer
	*/
	public function save($data, $id = NULL)
	{
		return ($id === NULL)
			? $this->_create_record($data)
			: $this->_update_recored($id, $data);
	}

	/*
	* Delete record by primery key from database
	*
	* @param ? $id Primery key
	* @return boolean
	*/
	public function delete($id)
	{
		if ($id) {
			// Pass filtered primery key value to db query
			$this->db->where($this->_primery_key, $this->filter($id));
			// Set query limit
			$this->limit(1);
			// Delete record from table
			$this->delete($this->_table_name);

			return TRUE;
		}

		return FALSE;
	}

	/*
	* Method creates a record
	*
	* @param array $data Insert data
	* @return integer
	*/
	private function _create_record($data)
	{
		// Not sure about this string
		if (! isset($data[$this->_primery_key])) $data[$this->_primery_key] = NULL;

		// Set timestamp
		if ($this->_timestamps) $data['created'] = data('now');

		// Insert query
		$this->db->set($data);
		$this->db->insert($this->_table_name);
		//--

		// Return just inserted id
		return $this->db->insert_id();
	}

	/*
	* Method updates record by id
	*
	* @param ? $data Primery key
	* @param array $data Update data
	* @return integer
	*/
	private function _update_recored($id, $data)
	{
		// Set timestamp
		if ($this->timestamps) $data['modified'] = data('now');

		// Update data
		$this->db->set($data);
		$this->db->where($this->_primery_key, $this->filter($id));
		$this->db->update($this->_table_name);
		//--

		return $id;
	}

}