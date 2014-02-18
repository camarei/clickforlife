<?php

class Session_model extends MY_Model {
	//@var string $_table_name Database table name
	protected $_table_name = 'sessions';

	//@var string $_primery_key Primery key field
	protected $_primary_key = 'id';

	//@var string $_primery_filter Filter method for a primery key
	protected $_primery_filter = '';

	//@var string $_order_by Default ordering
	protected $_order_by = '';

	//@var array $_rules The validation rules
	protected $_rules = array();

	//@var boolean $_timestamps Requed or not timestamps field
	protected $_timestamps = TRUE;

	//@var string $_sid Session id
	private $_sid = NULL;

	/*
	* Method returns sesion id
	*
	* @return integer
	*/
	public function get_sid()
	{	
		// Try to fetch session id
		if ($sid = $this->session->userdata('sid')){
			// Fetch session record by id
			if ($session = $this->get($sid)){
				// Update session records
				$this->save(array('modified' => date('now')), $sid);

				return $sid;
			}				
		}
		
		return NULL;	
	}

	// Method remove session id from session
	public function delete_sid()
	{
		$this->session->set_userdata('sid',NULL);
		$this->_sid = NULL;
	}

	/*
	* Open session for user and store this in database
	*
	* @param integer $user_id
	* @return integer
	*/
	public function open_session($user_id)
	{
		// Fetch session id
		$sid = $this->_generate_str(10);

		$now = new DateTime('NOW');

		// Prepare object to insert
		$this->db->set(array(
			'id'       => $sid,
			'user_id'  => $user_id,
			'created'  => $now->date,
			'modified' => $now->date
		));
		//--

		// Insert data into database
		$this->db->insert($this->_table_name);

		// Push session id to session 
		$this->session->set_userdata('sid', $sid);			
				
		return $sid;	
	}

	private function _generate_str($length = 10) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code  = "";
		$clen  = strlen($chars) - 1;  

		while (strlen($code) < $length) 
            $code .= $chars[mt_rand(0, $clen)];  

		return $code;
	}
}