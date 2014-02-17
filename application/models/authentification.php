<?php

class Authentification extends CI_Model {
    
    public function construct() {
        parrent::__construct();
    }

    /*
    * Method login user into the system
    *
    * @param stirng $username User name
    * @param string $password User password
    * @return array
    */
    public function login($username, $password) {

        // Query builder
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->limit(1);
        //--
        
        // Return one user record as assoc array
        return $this->db->get()->row_array();
        
    }
    
    public function logout() {
    	
    }
    
}

?>