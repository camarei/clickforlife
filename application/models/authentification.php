<?php

class Authentification extends MY_Model {

    //@var string $_table_name Database table name
    protected $_table_name = 'users';

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
    
    public function construct() {
        parrent::__construct();
    }

    /*
    * Method login user into the system
    *
    * @param stirng $email User email
    * @param string $password User password
    * @return array
    */
    public function login($email, $password) {

        return $this->get_one_by(array(
            'email'    => $email,
            'password' => $password
        ));
        
    }
    
	// Method unlogin user from site
	public function logout()
	{
		$this->session->unset_userdata('sid');     
		$this->sid = NULL;
		$this->uid = NULL;
	} 
}

?>