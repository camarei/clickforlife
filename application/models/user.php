<?php

class User extends MY_Model {
    
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
    
    
    public function __construct() {
    	parent::__construct();
    }
	
    /*
    *
    * @param integer $user_id The user id
    * @return object
    */
    public function get($user_id)
    {
        $this->db->select('*');
        $this->db->from($this->_table_name);
        $this->db->join('roles', 'roles.id = users.id');
        $this->db->where('users.id', $user_id);

        return $this->db->get()->result();
    }

    public function save(array $user)
    {
        if (isset($user['password'])) {
            $user['password'] = hash('sha1', $user['password']);
        }

        return parent::save($user);
    }
}

?>