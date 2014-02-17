<?php

class Authentification extends CI_Model {
    
    public function construct() {
        parrent::__construct();
    }
    
    public function login(/* $username, $password */) {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->limit(1);
        
        return $this->db->get()->row_array();
        
    }
    
    public function logout() {
    	
    }
    
}

?>