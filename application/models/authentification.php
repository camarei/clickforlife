<?php

class Authentification extends MY_Model {

    //@var string $_table_name Database table name
    protected $_table_name = 'users';

    //@var string $_primery_key Primery key field
    protected $_primery_key = 'id';

    //@var string $_primery_filter Filter method for a primery key
    protected $_primary_filter = 'intval';

    //@var string $_order_by Default ordering
    protected $_order_by = '';

    //@var array $_rules The validation rules
    protected $_rules = array();

    //@var boolean $_timestamps Requed or not timestamps field
    protected $_timestamps = FALSE;

    private $_uid = NULL;
    
    public function __construct() {
        parent::__construct();

        $this->load->model('session_model');
    }

    /*
    * Method login user into the system
    *
    * @param stirng $email User email
    * @param string $password User password
    * @return array
    */
    public function login($email, $password) {

    	$user = $this->get_one_by_email($email);

		if (! $user) return FALSE;

		// Password checking
        if ($password != hash('sha1', $user->password)) return FALSE;

    	$this->session_model->open_session($user->id);
		
		return TRUE;
    }

    /*
	* Return current user id
	*
	* @return integer
	*/
	public function get_uid()
	{	
		if ($this->_uid) return $this->_uid;

		// Get session id
		if ($sid = $this->session_model->get_sid()) {
			if ($session = $this->session_model->get($sid)) {
				$this->_uid = $session->user_id;
			}
		}

		return $this->_uid;
	}
    
	// Method unlogin user from site
	public function logout()
	{     
		$this->session_model->delete_sid();
		$this->_uid = NULL;
	}
	 
}

?>