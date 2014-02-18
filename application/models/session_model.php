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

	private $_sid = NULL;

	/*
	* Method returns sesion id
	*
	* @return integer
	*/
	public function get_sid()
	{	
		if ($sid = $this->session->userdata('sid')){
			if ($session = $this->get($sid)){

				$this->save(array('modified' => date('now')), $sid);

				return $sid;
			}				
		}
		
		return NULL;	
	}

	public function delete_sid()
	{
		$this->session->set_userdata('sid',NULL);
		$this->session->sess_destroy();
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
		$sid = $this->_generate_str(10);

		$now = new DateTime('NOW');

		$this->db->set(array(
			'id'       => $sid,
			'user_id'  => $user_id,
			'created'  => $now->date,
			'modified' => $now->date
		));

		$this->db->insert($this->_table_name);

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