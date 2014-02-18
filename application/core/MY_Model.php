<?php

class MY_Model extends CI_Model {

	//@var string $_table_name Database table name
	protected $_table_name = '';

	//@var string $_primary_key primary key field
	protected $_primary_key = 'id';

	//@var string $_primary_filter Filter method for a primary key
	protected $_primary_filter = 'intval';

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
	* @return object
	*/
	public function get_all()
	{
		// Set default ordering
		$this->db->order_by($this->_order_by);

		// Fetch all records
		return $this->db->get($this->_table_name)->result();
	}

	/*
	* Returns one record by primary key
	*
	* @param integer $id primary key
	* @return object
	*/
	public function get($id)
	{		
		// Find by primary key condition
		$this->db->where(array($this->_primary_key => $this->filter($id)));

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
		$filter = $this->_primary_filter;
		// Detect primary key filter
		return ($filter) ? $filter($value) : $value;
	}

	/*
	* Returns records by condition
	*
	* @param string $where Where condition
	* @return object
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
	* @param ? $id primary key
	* @return integer
	*/
	public function save($data, $id = NULL)
	{
		// Set timestamp
		if ($this->_timestamps == TRUE)
		{
			$now = new DateTime('NOW');
			$id || $data['created'] = $now->format('Y-m-d H:i:s');

			$data['modified'] = $now->format('Y-m-d H:i:s');
		}
		//--

		if ($id === NULL) {
			// Proccess primery key value
			!isset($data[$this->_primary_key]) || $data[$this->_primary_key] = NULL;

			$this->db->set($data);
			$this->db->insert($this->_table_name);

			return $this->db->insert_id();
		}
		else {
			// Update data
			$this->db->set($data);
			$this->db->where($this->_primary_key, $this->filter($id));
			$this->db->update($this->_table_name);
			//--
		}

		return $id;
	}

	/*
	* Delete record by primary key from database
	*
	* @param ? $id primary key
	* @return boolean
	*/
	public function delete($id)
	{
		if ($id) {
			// Pass filtered primary key value to db query
			$this->db->where($this->_primary_key, $this->filter($id));
			// Set query limit
			$this->limit(1);
			// Delete record from table
			$this->delete($this->_table_name);

			return TRUE;
		}

		return FALSE;
	}
}